<?php

namespace App\Jobs\OCI;

use Hitrov\OCI\Signer;
use http\Client\Curl\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Nette\Utils\Random;

class CreateUser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user_email;

    /**
     * Create a new job instance.
     */
    public function __construct($user_email)
    {
        $this->user_email = $user_email;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        sleep(1);
        $genId = 'user-'.Random::generate(15);
        $signer = new Signer(
            'ocid1.tenancy.oc1..aaaaaaaaglb5ldpcfzhab2hpacw5ofmqsyh6ooezrkx5kqmdba5ru7xkgdpa',
            'ocid1.user.oc1..aaaaaaaavi7yq46yc5bjdblb7zeuve7cuyq5dp4frnqfpwld6mhvoptglvta',
            'd1:b6:0d:b8:6c:f6:e0:e2:6a:01:63:28:d4:ba:b6:d7',
            Storage::path('oci_email.pem')
        );
        $curl = curl_init();

        $url = 'https://identity.us-phoenix-1.oci.oraclecloud.com/20160918/users/';
        $method = 'POST';
        $body = '{
            "compartmentId": "ocid1.tenancy.oc1..aaaaaaaaglb5ldpcfzhab2hpacw5ofmqsyh6ooezrkx5kqmdba5ru7xkgdpa",
            "description": "'.$genId.'",
            "email": "'.$this->user_email.'",
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
        $r = json_decode($response, true);

        \App\Models\User::query()->where(['email'=>$this->user_email])->update([
           'oci_user_id' => $r['id']
        ]);

    }
}
