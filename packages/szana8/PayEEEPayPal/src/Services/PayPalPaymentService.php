<?php

namespace szana8\PayEEEPayPal\Services;

use szana8\PayEEE\Managers\Contracts\PaymentInterface;

class PayPalPaymentService implements PaymentInterface
{
    public function __construct(array $config)
    {
    }

    public function pay(): string
    {
        return 'works paypal';
    }
}
