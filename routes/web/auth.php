<?php
use Illuminate\Support\Facades\Route;

Route::get('/auth/login', function () {
    return view('Auth.login');
})->name('auth.login');

Route::get('/auth/logout', function () {
    \Illuminate\Support\Facades\Auth::logout();
    return redirect(\route('auth.login'));
})->name('auth.logout');

Route::get('/auth/register', function () {
    return view('Auth.register');
})->name('auth.register');

Route::get('/auth/reset-password', function () {
    return view('Auth.reset-password');
})->name('auth.reset-password');

Route::get('/auth/verify-email', function () {
    return view('Auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/auth/verify-email/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');
