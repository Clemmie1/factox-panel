<?php

namespace App\Http\Controllers\OCI\ObjectStorage;

use App\Http\Controllers\Controller;
use Hitrov\OCI\Signer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DeleteBucket extends Controller
{
    static public function delete($bucketID)
    {
        $signer = new Signer(
            'ocid1.tenancy.oc1..aaaaaaaas3pyu6kxrchyx2tbljml3fzsltiig7e3hpujk5hvqjl4x46qzata',
            'ocid1.user.oc1..aaaaaaaapurduq4fvmy576w6euo5vc5d6pcxcbciq7jgfg7seqdf23zv7h3a',
            '8d:a9:cb:d8:22:45:51:9d:ab:7c:7c:92:8d:a7:e3:94',
            Storage::path('oci_key.pem')
        );
        $curl = curl_init();
        $url = 'https://objectstorage.eu-frankfurt-1.oraclecloud.com/n/frezk3uujhtw/b/'.$bucketID.'/';
        $method = 'DELETE';
        $body = '{

            "bucketName": "'.$bucketID.'",
            "namespaceName": "frezk3uujhtw"

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

        $arr = json_decode($response, true);

        if (is_null($arr)){
            return true;
        } else {
            return false;
        }

//        if ($arr['code'] != 'BucketNotEmpty'){
//            return true;
//        } else {
//            return false;
//        }

        //return json_decode($response, true);
    }
}
