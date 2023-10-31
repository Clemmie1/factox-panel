<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class OracleObjectStorageController extends Controller
{
    public function listBuckets()
    {
        $tenancyId = config('app.oracle_cloud_tenancy_ocid');
        $userId = config('app.oracle_cloud_user_ocid');
        $keyFingerprint = config('app.oracle_cloud_key_fingerprint');
        $privateKeyPath = config('app.oracle_cloud_private_key_path');
        $region = config('app.oracle_cloud_region');

        $httpClient = new Client();

        $date = date('D, d M Y H:i:s T');
        $target = '/n/' . rawurlencode($tenancyId) . '/b/';

        $requestHeaders = [
            'Content-Type' => 'application/json',
            'Date' => $date,
            'Authorization' => $this->generateAuthorizationHeader($date, $target, $privateKeyPath),
        ];

        $response = $httpClient->request('GET', "https://objectstorage.$region.oraclecloud.com/v1/$tenancyId/", [
            'headers' => $requestHeaders,
        ]);

        $buckets = json_decode($response->getBody(), true);

        return response()->json($buckets);
    }

    private function generateAuthorizationHeader($date, $target, $privateKeyPath)
    {
        $key = openssl_get_privatekey('file://' . $privateKeyPath);
        openssl_sign("GET\n\n\n$date\n$target", $signature, $key, 'sha256');
        openssl_free_key($key);

        return 'Signature version="1",keyId="' . config('app.oracle_cloud_user_ocid') . '/' . config('app.oracle_cloud_tenancy_ocid') . '/' . config('app.oracle_cloud_key_fingerprint') . '",algorithm="rsa-sha256",headers="date (request-target)",signature="' . base64_encode($signature) . '"';
    }
}
