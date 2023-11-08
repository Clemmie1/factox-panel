<?php

use App\Models\ObjectStorage;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use Hitrov\OCI\Signer;

use App\Http\Controllers\OCI\AI\LanguageTranslation;
use OutlineApiClient\OutlineApiClient;
use OutlineApiClient\OutlineKey;

Route::domain('cloud.' . env('APP_URL'))->group(function () {

    Route::get('/gen', function () {


        try {
            // Your Outline server address
            $serverUrl = 'https://168.138.70.14:11493/AfHcGvKFa8PY1RduJ1by4Q';

            $api = new OutlineApiClient($serverUrl);
            $keysList = $api->getKeys();
            $key = $api->create();
            dd($key);
        } catch (\Exception $e) {

        }
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
