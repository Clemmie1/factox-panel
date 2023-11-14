<?php
use Illuminate\Support\Facades\Route;
use \App\Models\Vpn;

Route::domain('cloud.' . env('APP_URL'))->group(function () {
    Route::get('/vpn', function () {
        return view('Panel.VPN.home');
    })->middleware(['verified', 'auth'])->name('cloud.vpn.home');

    Route::get('/vpn/{vpnID}', function ($vpnID) {

        $get = Vpn::query()->where([
            'owner_id' => Auth::id(),
            'vpn_id' => $vpnID,
            'status' => 2
        ])->first();

        if ($get){
            return view('Panel.VPN.Vpn.home')->with([
                'vpnData' => $get,
                'vpnID' => $vpnID
            ]);
        } else {
            return redirect(\route('cloud.vpn.home'));
        }
    })->middleware(['verified', 'auth'])->name('cloud.vpn.view');
});
