<?php

use App\Models\ObjectStorage;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use Hitrov\OCI\Signer;

use App\Http\Controllers\OCI\AI\LanguageTranslation;

Route::domain('cloud.' . env('APP_URL'))->group(function () {
    Route::get('/gen', function () {

        $first = DB::table('users')
            ->whereNull('first_name');

        $users = DB::table('users')
            ->whereNull('last_name')
            ->union($first)
            ->get();

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



    Route::get('/oci-limit', function () {

        $signer = new Signer(
            'ocid1.compartment.oc1..aaaaaaaaycprt2wjou7upehz6zykigirygfif2ne7qcek73erujou2qeeyla',
            'ocid1.user.oc1..aaaaaaaaznauodwapak2pkynlmnusm6yzbhxzlg7bvmnuae5tsqoh4f56eva',
            'ad:83:e3:33:c1:d3:e8:86:13:ef:9d:7e:a0:cb:8a:6e',
            Storage::path('dd.pem')
        );
        $curl = curl_init();
        $method = 'GET';
        $url = 'https://identity.eu-frankfurt-1.oci.oraclecloud.com/20160918/users?compartmentId=ocid1.compartment.oc1..aaaaaaaaycprt2wjou7upehz6zykigirygfif2ne7qcek73erujou2qeeyla';
        $body = '';


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
        $responseArray = json_decode($response, true);
        return $responseArray;
    });

    Route::get('/oci-create', function () {

        $signer = new Signer(
            'ocid1.tenancy.oc1..aaaaaaaawczy6vp644dqqkhpux2waecbsm6pafigmxfqn42dt2go3xah6rxq',
            'ocid1.user.oc1..aaaaaaaa5wv3ehksgvfpha2nmqp4w6lrpwrpuwurdsuen5qayafwhz73foga',
            '92:dd:c2:cb:4b:08:69:4e:69:dc:4c:32:c6:06:90:9c',
            Storage::path('dd.pem')
        );
        $curl = curl_init();
        $method = 'POST';
        $url = 'https://iaas.uk-london-1.oraclecloud.com/20160918/instances/';
        $body = '{

            "compartmentId":"ocid1.tenancy.oc1..aaaaaaaawczy6vp644dqqkhpux2waecbsm6pafigmxfqn42dt2go3xah6rxq",
            "availabilityDomain":"GkEe:UK-LONDON-1-AD-1",
            "shape":"BM.Standard3.64",
            "subnetId":"ocid1.subnet.oc1.uk-london-1.aaaaaaaawbms4sidhyucxaw2jwidwdjkhgjhvipmirpywyiiraxiioi7h2uq",
            "imageId":"ocid1.image.oc1.uk-london-1.aaaaaaaaxwntoayd4nhkkr46lpry2jg6zqvrl32mgfgztiriys5svfvmadlq"


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
        $responseArray = json_decode($response, true);
        return $responseArray;
    });

    Route::get('/oci-update.user', function () {

        $signer = new Signer(
            'ocid1.tenancy.oc1..aaaaaaaawczy6vp644dqqkhpux2waecbsm6pafigmxfqn42dt2go3xah6rxq',
            'ocid1.user.oc1..aaaaaaaa5wv3ehksgvfpha2nmqp4w6lrpwrpuwurdsuen5qayafwhz73foga',
            '92:dd:c2:cb:4b:08:69:4e:69:dc:4c:32:c6:06:90:9c',
            Storage::path('dd.pem')
        );
        $curl = curl_init();
        $method = 'POST';
        $url = 'https://identity.uk-london-1.oci.oraclecloud.com/20160918/users/ocid1.user.oc1..aaaaaaaa5wv3ehksgvfpha2nmqp4w6lrpwrpuwurdsuen5qayafwhz73foga/uiPassword';
        $body = '';


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
        $responseArray = json_decode($response, true);
        return $responseArray;
    });
});
