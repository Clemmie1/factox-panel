<?php

use App\Http\Controllers\OCI\Email\MessagingEmailController;
use App\Models\User;
use Hitrov\OCI\Signer;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Nette\Utils\Random;

Route::domain('cloud.' . env('APP_URL'))->group(function () {

    Route::get('/test', function () {

        $genId = 'user-'.Random::generate(15);
        $signer = new Signer(
            'ocid1.tenancy.oc1..aaaaaaaaglb5ldpcfzhab2hpacw5ofmqsyh6ooezrkx5kqmdba5ru7xkgdpa',
            'ocid1.user.oc1..aaaaaaaavi7yq46yc5bjdblb7zeuve7cuyq5dp4frnqfpwld6mhvoptglvta',
            'c9:9c:c9:7c:92:3b:0e:df:ce:d5:b0:a6:a2:d0:c9:05',
            Storage::path('oci_email.pem')
        );
        $curl = curl_init();
        $url = 'https://identity.us-phoenix-1.oci.oraclecloud.com/20160918/users';
        $method = 'POST';

        $genKey = 'fx-ai-'.Random::generate(10);

        $body = '{
            "compartmentId": "ocid1.tenancy.oc1..aaaaaaaaglb5ldpcfzhab2hpacw5ofmqsyh6ooezrkx5kqmdba5ru7xkgdpa",
            "description": "'.$genId.'",
            "email": "xperikss@gmail.com",
            "name": "'.$genId.'"
        }';

        $headers = $signer->getHeaders($url, $method, $body, 'application/json');


        $curlOptions = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 5,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_HTTPHEADER => $headers,
        ];

        if ($body) {
            // not needed for GET or HEAD requests
            $curlOptions[CURLOPT_POSTFIELDS] = $body;
        }

        curl_setopt_array($curl, $curlOptions);
        $response = curl_exec($curl);
        $get = json_decode($response);
        User::query()->where(['email'=>'xperikss@gmail.com'])->update(["oci_user_id" => $get->id]);
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
