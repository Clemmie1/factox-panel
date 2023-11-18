<?php

use App\Http\Controllers\OCI\Email\MessagingEmailController;
use Hitrov\OCI\Signer;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Nette\Utils\Random;

Route::domain('cloud.' . env('APP_URL'))->group(function () {

    Route::get('/test', function () {

        $s = MessagingEmailController::CreateSmtpUser(\Auth::user()->oci_user_id);

        return $s['status'];
    });

    Route::get('/', function () {
        return view('Panel.home');
    })->middleware(['verified', 'auth'])->name('cloud.home');


    Route::get('/data-base', function () {
        return view('Panel.DataBase.home');
    })->middleware(['verified', 'auth'])->name('cloud.db.home');


    Route::get('/web-hosting', function () {
        return view('Panel.WebHosting.home');
    })->middleware(['verified', 'auth'])->name('cloud.wh.home');
});
