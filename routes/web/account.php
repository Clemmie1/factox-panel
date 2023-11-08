<?php
use Illuminate\Support\Facades\Route;

Route::domain('cloud.' . env('APP_URL'))->group(function () {
    Route::get('/account/settings', function () {
        return view('Panel.Account.settings');
    })->middleware(['verified', 'auth'])->name('cloud.Account.settings');

    Route::get('/account/billing', function () {
        return view('Panel.Billing.home');
    })->middleware(['verified', 'auth'])->name('cloud.bill.home');
});
