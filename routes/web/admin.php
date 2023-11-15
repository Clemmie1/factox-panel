<?php

use Illuminate\Support\Facades\Route;

Route::domain('admin.' . env('APP_DOMAIN'))->group(function () {
    Route::group(['middleware' => ['auth', 'admin']], function () {

        Route::get('/', function () {
            return 'd';
        });
    });
});
