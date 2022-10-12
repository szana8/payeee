<?php

namespace szana8\PayEEE\Facades;

use Illuminate\Support\Facades\Facade;
use szana8\PayEEE\Managers\Contracts\Factory;

class PaymentManager extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return Factory::class;
    }
}
