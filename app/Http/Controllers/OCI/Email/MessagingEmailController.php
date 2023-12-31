<?php

namespace App\Http\Controllers\OCI\Email;

use App\Http\Controllers\Controller;
use App\Models\SmtpUser;
use App\Models\User;
use Hitrov\OCI\Signer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Yaml\Yaml;
use function Symfony\Component\Translation\t;

class MessagingEmailController extends Controller
{

    static public function CreateSmtpUser(string $ociUserId)
    {

        $url = 'https://identity.us-phoenix-1.oci.oraclecloud.com/20160918/users/'.$ociUserId.'/smtpCredentials/';
        $method = 'POST';
        $body = '{
            "description": "test"
        }';

        $instance = new MessagingEmailController();
        return $instance->sendRequest($url, $method, $body);
    }

    static public function DeleteSmtpUser(string $ociUserId, string $smtpCredentialId)
    {
        $url = 'https://identity.us-phoenix-1.oci.oraclecloud.com/20160918/users/'.$ociUserId.'/smtpCredentials/'.$smtpCredentialId;
        $method = 'DELETE';
        $body = '';

        $instance = new MessagingEmailController();
        return $instance->sendRequest($url, $method, $body);

    }

    public static function CreateEmailDomain()
    {
        $url = 'https://ctrl.email.us-phoenix-1.oci.oraclecloud.com/20170907/emailDomains';
        $method = 'POST';
        $body = '{
            "compartmentId": "ocid1.tenancy.oc1..aaaaaaaaglb5ldpcfzhab2hpacw5ofmqsyh6ooezrkx5kqmdba5ru7xkgdpa",
            "name": "dsadsadfsdsadas.com"
        }';

        $instance = new MessagingEmailController();
        return $instance->sendRequest($url, $method, $body);
    }

    public function sendRequest(string $url, string $method, string $body)
    {
        $signer = new Signer(
            'ocid1.tenancy.oc1..aaaaaaaaglb5ldpcfzhab2hpacw5ofmqsyh6ooezrkx5kqmdba5ru7xkgdpa',
            'ocid1.user.oc1..aaaaaaaavi7yq46yc5bjdblb7zeuve7cuyq5dp4frnqfpwld6mhvoptglvta',
            'c9:9c:c9:7c:92:3b:0e:df:ce:d5:b0:a6:a2:d0:c9:05',
            Storage::path('oci_email.pem')
        );
        $curl = curl_init();

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

        $httpStatus = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        curl_close($curl);

        return [
            'status' => $httpStatus,
            'body' => json_decode($response, true),
        ];

    }
}
