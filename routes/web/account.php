<?php
use Illuminate\Support\Facades\Route;
use \App\Models\Invoice;

Route::domain('cloud.' . env('APP_URL'))->group(function () {

    Route::group(['middleware' => ['auth', 'verified']], function (){
        Route::get('/account/settings', function () {
            return view('Panel.Account.settings');
        })->name('cloud.Account.settings');

        Route::get('/billing', function () {
            return view('Panel.Billing.home');
        })->name('cloud.bill.home');

        Route::get('/billing/viewInvoice/{invoiceID}', function ($invoiceID) {

            $get = Invoice::query()->where([
                'invoice_id' => $invoiceID
            ])->first();

            if ($get){
                return view('Panel.Billing.viewInvoice')->with([
                    'invoiceData' => $get,
                    'invoice_id' => $invoiceID,
                ]);
            } else {
                return redirect(\route('cloud.bill.home'));
            }

        })->name('cloud.bill.viewInvoice');
    });


});
