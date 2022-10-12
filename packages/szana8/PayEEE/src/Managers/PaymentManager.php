<?php

namespace szana8\PayEEE\Managers;

use Illuminate\Contracts\Container\Container;
use Illuminate\Support\Manager;
use InvalidArgumentException;
use szana8\PayEEE\Managers\Contracts\Factory;
use szana8\PayEEE\Managers\Contracts\PaymentInterface;

class PaymentManager extends Manager implements Factory
{
    public function getDefaultDriver(): string
    {
        throw new InvalidArgumentException('No Payment driver was specified.');
    }

    /**
     * Get a driver instance.
     *
     * @param string $driver
     * @return mixed
     */
    public function with(string $driver): PaymentInterface
    {
        return $this->driver($driver);
    }

    /**
     * Build a provider instance.
     *
     * @param string $provider
     * @param array $config
     * @return PaymentInterface
     */
    public function buildProvider(string $provider, array $config): PaymentInterface
    {
        return new $provider($config);
    }
}
