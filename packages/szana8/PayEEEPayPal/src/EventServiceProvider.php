<?php

namespace szana8\PayEEEPayPal;

use szana8\PayEEE\Events\PaymentManagerWasCalled;

class EventServiceProvider extends \Illuminate\Foundation\Support\Providers\EventServiceProvider
{
    protected $listen = [
        PaymentManagerWasCalled::class => [
            PayPalExtendPayment::class.'@handle',
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot() {
        parent::boot();
    }
}
