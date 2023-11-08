<?php
use Illuminate\Support\Facades\Route;

Route::get('/ai-service', function () {
    return view('Panel.AI.home');
})->middleware(['verified', 'auth'])->name('cloud.ai.home');

Route::get('/ai-service/language/translation', function () {
    return view('Panel.AI.LanguageTranslation');
})->middleware(['verified', 'auth'])->name('cloud.ai.LanguageTranslation');

Route::get('/ai-service/language/pretrained', function () {
    return view('Panel.AI.LanguagePretrained');
})->middleware(['verified', 'auth'])->name('cloud.ai.LanguagePretrained');
