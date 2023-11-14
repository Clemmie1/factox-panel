<?php

use App\Models\ObjectStorage;
use Illuminate\Support\Facades\Route;

Route::domain('cloud.' . env('APP_URL'))->group(function () {
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
