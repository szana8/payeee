<?php

\Illuminate\Support\Facades\Route::prefix('payeee')->middleware(['web', 'auth'])->group(function () {

    Route::get('dashboard', [\szana8\PayEEE\Http\Controllers\DashboardController::class, 'index'])->name('payeee.dashboard');
    Route::get('providers', [\szana8\PayEEE\Http\Controllers\ProvidersController::class, 'index'])->name('payeee.providers');

});
