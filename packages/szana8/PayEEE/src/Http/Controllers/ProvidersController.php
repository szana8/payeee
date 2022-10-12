<?php

namespace szana8\PayEEE\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use szana8\PayEEE\Facades\PaymentManager;
use szana8\PayEEE\Models\PaymentProvider;

class ProvidersController extends Controller
{
    public function index()
    {
        return view('payeee::providers', [
            'providers' => PaymentProvider::all(),
        ]);
    }

    public function test(Request $request)
    {
        app()->get(PaymentManager::class)->driver('paypal');
        return PaymentManager::driver('paypal')->pay();
    }
}
