<?php

namespace szana8\PayEEE\Managers\Contracts;

interface PaymentInterface
{
    public function pay(): string;
}
