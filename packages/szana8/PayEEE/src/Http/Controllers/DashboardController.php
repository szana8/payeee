<?php

namespace szana8\PayEEE\Http\Controllers;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('payeee::dashboard', [

        ]);
    }
}
