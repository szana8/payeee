<?php

namespace szana8\PayEEEPayPal;

use szana8\PayEEE\Events\PaymentManagerWasCalled;
use szana8\PayEEEPayPal\Services\PayPalPaymentService;

class PayPalExtendPayment
{
    public function handle(PaymentManagerWasCalled $paymentManagerWasCalled)
    {
        $paymentManagerWasCalled->extendPayment('paypal', PayPalPaymentService::class);
    }
}
