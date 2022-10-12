<?php

namespace szana8\PayEEEPayPal\Facades;

use Illuminate\Support\Facades\Facade;

class PayEEEPayPal extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'payeeepaypal';
    }
}
