<?php
use Illuminate\Support\Facades\Route;

Route::get('/vpn', function () {
    return view('Panel.VPN.home');
})->middleware(['verified', 'auth'])->name('cloud.vpn.home');
