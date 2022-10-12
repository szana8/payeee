<?php

namespace szana8\PayEEE\Events;

use Illuminate\Contracts\Container\Container as Application;
use szana8\PayEEE\Managers\Contracts\Factory;
use szana8\PayEEE\Managers\Contracts\PaymentInterface;
use szana8\PayEEE\Managers\PaymentManager;

class PaymentManagerWasCalled
{
    protected $app;

    /**
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }


    public function extendPayment($providerName, $providerClass): void
    {
        /** @var PaymentManager $payment */
        $payment = $this->app->make(Factory::class);

        $this->classExists($providerClass);

        $payment->extend(
            $providerName,
            function () use ($payment, $providerName, $providerClass) {
                return $this->buildProvider($payment, $providerName, $providerClass);
            }
        );
    }

    protected function buildProvider(PaymentManager $payment, $providerName, $providerClass): PaymentInterface
    {
        return $payment->buildProvider($providerClass, []);
    }

    private function classExists($providerClass)
    {
        if (! class_exists($providerClass)) {
            throw new \InvalidArgumentException("{$providerClass} doesn't exist");
        }
    }
}
