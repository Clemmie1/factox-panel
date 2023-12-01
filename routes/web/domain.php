<?php
use Illuminate\Support\Facades\Route;

Route::domain('cloud.' . env('APP_URL'))->group(function () {
    Route::get('/domain', function () {
        return view('Panel.Domain.home');
    })->name('cloud.domain.home');
});
