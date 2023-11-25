<?php

namespace App\Http\Controllers\OCI\AI;

use App\Http\Controllers\Controller;
use Hitrov\OCI\Exception\PrivateKeyFileNotFoundException;
use Hitrov\OCI\Exception\SignerValidateException;
use Hitrov\OCI\Exception\SigningValidationFailedException;
use Hitrov\OCI\Signer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Nette\Utils\Random;

class LanguagePretrained extends Controller
{

    /**
     * @throws SigningValidationFailedException
     * @throws SignerValidateException
     * @throws PrivateKeyFileNotFoundException
     */
    static public function BatchDetectDominantLanguage(string $txt)
    {
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

        $instance = new LanguagePretrained();
        return $instance->sendRequest($url, $method, $body);
    }

    /**
     * @throws SigningValidationFailedException
     * @throws SignerValidateException
     * @throws PrivateKeyFileNotFoundException
     */
    static public function BatchDetectLanguageTextClassification(string $txt)
    {
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

        $instance = new LanguagePretrained();
        return $instance->sendRequest($url, $method, $body);
    }

    /**
     * @throws SigningValidationFailedException
     * @throws SignerValidateException
     * @throws PrivateKeyFileNotFoundException
     */
    static public function BatchDetectLanguageKeyPhrases(string $txt)
    {
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

        $instance = new LanguagePretrained();
        return $instance->sendRequest($url, $method, $body);
    }

    /**
     * @throws SigningValidationFailedException
     * @throws SignerValidateException
     * @throws PrivateKeyFileNotFoundException
     */
    static public function BatchDetectLanguageEntities(string $txt)
    {

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

        $instance = new LanguagePretrained();
        return $instance->sendRequest($url, $method, $body);
    }


    /**
     * @throws SigningValidationFailedException
     * @throws SignerValidateException
     * @throws PrivateKeyFileNotFoundException
     */
    public function sendRequest(string $url, string $method, string $body)
    {
        $signer = new Signer(
            'ocid1.tenancy.oc1..aaaaaaaas3pyu6kxrchyx2tbljml3fzsltiig7e3hpujk5hvqjl4x46qzata',
            'ocid1.user.oc1..aaaaaaaapurduq4fvmy576w6euo5vc5d6pcxcbciq7jgfg7seqdf23zv7h3a',
            '8d:a9:cb:d8:22:45:51:9d:ab:7c:7c:92:8d:a7:e3:94',
            Storage::path('oci_key.pem')
        );
        $curl = curl_init();


        $curlOptions = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 5,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_HTTPHEADER => $signer->getHeaders($url, $method, $body, 'application/json'),
        ];

        if ($body) {
            // not needed for GET or HEAD requests
            $curlOptions[CURLOPT_POSTFIELDS] = $body;
        }

        curl_setopt_array($curl, $curlOptions);
        $response = curl_exec($curl);
        return json_decode($response, false);
    }

}
