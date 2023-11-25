<?php

namespace App\Jobs;

use App\Models\ObjectStorage;
use Hitrov\OCI\Signer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class CreateObjectStorage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $bucketID;

    /**
     * Create a new job instance.
     */
    public function __construct($bucketID)
    {
        $this->bucketID = $bucketID;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        sleep(10);
        $signer = new Signer(
            'ocid1.tenancy.oc1..aaaaaaaas3pyu6kxrchyx2tbljml3fzsltiig7e3hpujk5hvqjl4x46qzata',
            'ocid1.user.oc1..aaaaaaaapurduq4fvmy576w6euo5vc5d6pcxcbciq7jgfg7seqdf23zv7h3a',
            '8d:a9:cb:d8:22:45:51:9d:ab:7c:7c:92:8d:a7:e3:94',
            Storage::path('oci_key.pem')
        );
        $curl = curl_init();
        $url = 'https://objectstorage.eu-frankfurt-1.oraclecloud.com/n/frezk3uujhtw/b/?compartmentId=ocid1.tenancy.oc1..aaaaaaaas3pyu6kxrchyx2tbljml3fzsltiig7e3hpujk5hvqjl4x46qzata';
        $method = 'POST';
        $body = '{"name": "'.$this->bucketID.'", "compartmentId": "ocid1.tenancy.oc1..aaaaaaaas3pyu6kxrchyx2tbljml3fzsltiig7e3hpujk5hvqjl4x46qzata"}';

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
        curl_exec($curl);
        sleep(1);
        ObjectStorage::where('bucket_id', $this->bucketID)->update([
            'status' => 2
        ]);
    }
}
