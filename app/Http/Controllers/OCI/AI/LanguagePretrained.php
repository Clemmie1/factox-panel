<?php

namespace App\Http\Controllers\OCI\AI;

use App\Http\Controllers\Controller;
use Hitrov\OCI\Signer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Nette\Utils\Random;

class LanguagePretrained extends Controller
{

    static public function BatchDetectDominantLanguage(string $txt)
    {
        $signer = new Signer(
            'ocid1.tenancy.oc1..aaaaaaaas3pyu6kxrchyx2tbljml3fzsltiig7e3hpujk5hvqjl4x46qzata',
            'ocid1.user.oc1..aaaaaaaapurduq4fvmy576w6euo5vc5d6pcxcbciq7jgfg7seqdf23zv7h3a',
            'd1:1a:1b:32:e5:71:1b:18:f2:a4:75:c4:e8:b8:39:cf',
            Storage::path('oci_key.pem')
        );
        $curl = curl_init();
        $url = 'https://language.aiservice.eu-frankfurt-1.oci.oraclecloud.com/20221001/actions/batchDetectDominantLanguage';
        $method = 'POST';

        $genKey = 'fx-ai-'.Random::generate(10);

        $body = '{
           "documents":[
              {
                 "key":"'.$genKey.'",
                 "text":"'.$txt.'"
              }
           ]

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
        return json_decode($response, true);
    }

    static public function BatchDetectLanguageTextClassification(string $txt)
    {
        $signer = new Signer(
            'ocid1.tenancy.oc1..aaaaaaaas3pyu6kxrchyx2tbljml3fzsltiig7e3hpujk5hvqjl4x46qzata',
            'ocid1.user.oc1..aaaaaaaapurduq4fvmy576w6euo5vc5d6pcxcbciq7jgfg7seqdf23zv7h3a',
            'd1:1a:1b:32:e5:71:1b:18:f2:a4:75:c4:e8:b8:39:cf',
            Storage::path('oci_key.pem')
        );
        $curl = curl_init();
        $url = 'https://language.aiservice.eu-frankfurt-1.oci.oraclecloud.com/20221001/actions/batchDetectLanguageTextClassification';
        $method = 'POST';

        $genKey = 'fx-ai-'.Random::generate(10);

        $body = '{
           "documents":[
              {
                 "key":"'.$genKey.'",
                 "text":"'.$txt.'",
                 "languageCode":"auto"
              }
           ]

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
        return json_decode($response, true);
    }

    static public function BatchDetectLanguageKeyPhrases(string $txt)
    {
        $signer = new Signer(
            'ocid1.tenancy.oc1..aaaaaaaas3pyu6kxrchyx2tbljml3fzsltiig7e3hpujk5hvqjl4x46qzata',
            'ocid1.user.oc1..aaaaaaaapurduq4fvmy576w6euo5vc5d6pcxcbciq7jgfg7seqdf23zv7h3a',
            'd1:1a:1b:32:e5:71:1b:18:f2:a4:75:c4:e8:b8:39:cf',
            Storage::path('oci_key.pem')
        );
        $curl = curl_init();
        $url = 'https://language.aiservice.eu-frankfurt-1.oci.oraclecloud.com/20221001/actions/batchDetectLanguageKeyPhrases';
        $method = 'POST';

        $genKey = 'fx-ai-'.Random::generate(10);

        $body = '{
           "documents":[
              {
                 "key":"'.$genKey.'",
                 "text":"'.$txt.'",
                 "languageCode":"auto"
              }
           ]

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
        return json_decode($response, true);
    }

    static public function BatchDetectLanguageEntities(string $txt)
    {
        $signer = new Signer(
            'ocid1.tenancy.oc1..aaaaaaaas3pyu6kxrchyx2tbljml3fzsltiig7e3hpujk5hvqjl4x46qzata',
            'ocid1.user.oc1..aaaaaaaapurduq4fvmy576w6euo5vc5d6pcxcbciq7jgfg7seqdf23zv7h3a',
            'd1:1a:1b:32:e5:71:1b:18:f2:a4:75:c4:e8:b8:39:cf',
            Storage::path('oci_key.pem')
        );
        $curl = curl_init();
        $url = 'https://language.aiservice.eu-frankfurt-1.oci.oraclecloud.com/20221001/actions/batchDetectLanguageEntities';
        $method = 'POST';

        $genKey = 'fx-ai-'.Random::generate(10);

        $body = '{
           "documents":[
              {
                 "key":"'.$genKey.'",
                 "text":"'.$txt.'",
                 "languageCode":"auto"
              }
           ]

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

            $curlOptions[CURLOPT_POSTFIELDS] = $body;
        }

        curl_setopt_array($curl, $curlOptions);
        $response = curl_exec($curl);
        return json_decode($response, true);
    }

}
