<?php

use Illuminate\Support\Facades\Route;

Route::domain('cloud.' . env('APP_URL'))->group(function () {

    Route::get('/messaging/email', function () {
        return view('Panel.Messaging.Email.home');
    })->middleware(['verified', 'auth'])->name('cloud.messaging.email.home');

    Route::get('/messaging/email/configuration', function () {
        return view('Panel.Messaging.Email.configuration');
    })->middleware(['verified', 'auth'])->name('cloud.messaging.email.configuration');

    Route::get('/messaging/email/email-domains', function () {
        return view('Panel.Messaging.Email.not-actived');
//        return view('Panel.Messaging.Email.email-domains');
    })->middleware(['verified', 'auth'])->name('cloud.messaging.email.email-domains');

    Route::get('/messaging/email/senders', function () {
        return view('Panel.Messaging.Email.senders');
    })->middleware(['verified', 'auth'])->name('cloud.messaging.email.senders');

    Route::get('/messaging/email/suppressions', function () {
        return view('Panel.Messaging.Email.suppressions');
    })->middleware(['verified', 'auth'])->name('cloud.messaging.email.suppressions');
});
