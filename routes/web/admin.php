<?php

use Illuminate\Support\Facades\Route;

Route::domain('cloud.' . env('APP_URL'))->group(function () {
    Route::group(['middleware' => ['auth', 'admin']], function () {

        Route::get('/ap', function () {

        });

    });
});
