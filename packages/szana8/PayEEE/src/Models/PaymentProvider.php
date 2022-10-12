<?php
namespace szana8\PayEEE\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use szana8\PayEEE\Database\Factories\PaymentProviderFactory;

class PaymentProvider extends Model
{
    use HasFactory;

    protected static function newFactory(): PaymentProviderFactory
    {
        return PaymentProviderFactory::new();
    }

}
