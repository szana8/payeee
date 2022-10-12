<?php

namespace szana8\PayEEE\Facades;

use Illuminate\Support\Facades\Facade;

class PayEEE extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'payeee';
    }
}
