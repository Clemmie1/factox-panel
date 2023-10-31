<?php

use App\Models\ObjectStorage;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use Hitrov\OCI\Signer;

use App\Http\Controllers\OCI\AI\LanguageTranslation;

Route::domain('cloud.' . env('APP_URL'))->group(function () {
    Route::get('/gen', function () {

        $file = St

    });

    Route::get('/', function () {
        return view('Panel.home');
    })->middleware(['verified', 'auth'])->name('cloud.home');

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


    Route::get('/data-base', function () {
        return view('Panel.DataBase.home');
    })->middleware(['verified', 'auth'])->name('cloud.db.home');

    Route::get('/vpn', function () {
        return view('Panel.VPN.home');
    })->middleware(['verified', 'auth'])->name('cloud.vpn.home');

    Route::get('/web-hosting', function () {
        return view('Panel.WebHosting.home');
    })->middleware(['verified', 'auth'])->name('cloud.wh.home');

    Route::get('/ai-service', function () {
        return view('Panel.AI.home');
    })->middleware(['verified', 'auth'])->name('cloud.ai.home');

    Route::get('/ai-service/language/translation', function () {
        return view('Panel.AI.LanguageTranslation');
    })->middleware(['verified', 'auth'])->name('cloud.ai.LanguageTranslation');

    Route::get('/ai-service/language/pretrained', function () {
        return view('Panel.AI.LanguagePretrained');
    })->middleware(['verified', 'auth'])->name('cloud.ai.LanguagePretrained');

    Route::get('/account/settings', function () {
        return view('Panel.Account.settings');
    })->middleware(['verified', 'auth'])->name('cloud.Account.settings');

    Route::get('/billing', function () {
        return view('Panel.Billing.home');
    })->middleware(['verified', 'auth'])->name('cloud.bill.home');

    Route::get('/support', function () {
        return view('Panel.Support.tickets');
    })->middleware(['verified', 'auth'])->name('support.tickets');

    Route::get('/support/ticket/{ticket_id}', function ($ticket_id) {

        $get = \App\Models\SupportTicket::where([
            'owner_id' => Auth::id(),
            'ticket_id' => $ticket_id,
        ])->first();

        if ($get){
            return view('Panel.Support.ViewTicket.home')->with([
                'ticketData' => $get,
                'ticketID' => $ticket_id,
            ]);
        } else {
            return redirect(\route('support.tickets'));
        }

    })->middleware(['verified', 'auth'])->name('support.tickets.viewticket');

    Route::get('/object-storage', function () {
        return view('Panel.StorageObject.home');
    })->middleware(['verified', 'auth'])->name('cloud.StorageObject.home');

    Route::get('/object-storage/{bucketID}', function ($bucketID) {

        $get = ObjectStorage::where([
            'owner_id' => Auth::id(),
            'bucket_id' => $bucketID,
            'status' => 2
        ])->first();

        if ($get){
            return view('Panel.StorageObject.Bucket.home')->with([
                'bucketData' => $get,
                'bucketID' => $bucketID
            ]);
        } else {
            return redirect(\route('cloud.StorageObject.home'));
        }
    })->middleware(['verified', 'auth'])->name('cloud.StorageObject.bucket');

    Route::get('/object-storage/{bucketID}/objects', function ($bucketID) {

        $get = ObjectStorage::where([
            'owner_id' => Auth::id(),
            'bucket_id' => $bucketID,
            'status' => 2
        ])->first();

        if ($get){
            return view('Panel.StorageObject.Bucket.objects')->with([
                'bucketData' => $get,
                'bucketID' => $bucketID
            ]);
        } else {
            return redirect(\route('cloud.StorageObject.home'));
        }
    })->middleware(['verified', 'auth'])->name('cloud.StorageObject.bucket.objects');
});
