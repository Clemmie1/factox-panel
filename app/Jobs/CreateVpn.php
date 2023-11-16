<?php

namespace App\Jobs;

use App\Models\ObjectStorage;
use App\Models\Vpn;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use OutlineApiClient\OutlineApiClient;
use OutlineApiClient\OutlineKey;

class CreateVpn implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $vpnID;
    protected $traffic;
    protected $location;

    /**
     * Create a new job instance.
     */
    public function __construct($vpnID, $traffic, $location)
    {
        $this->vpnID = $vpnID;
        $this->traffic = $traffic;
        $this->location = $location;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if ($this->location == 'us-phoenix'){
            $server = 'https://129.146.187.221:6108/yitYlSo7lK4o_uU1fI_EuQ';
            $this->sendCreateKey($server);
        }

        if ($this->location == 'ca-toronto'){
            $server = 'https://168.138.70.14:11493/AfHcGvKFa8PY1RduJ1by4Q';
            $this->sendCreateKey($server);
        }

        if ($this->location == 'eu-marseille'){
            $server = 'https://129.151.247.148:47910/hN__E_jgelPGieBaTmcXdA';
            $this->sendCreateKey($server);
        }

        if ($this->location == 'ap-tokyo'){
            $server = 'https://138.2.13.51:12409/XsuK0eE6t_xLBoYSam5r3A';
            $this->sendCreateKey($server);
        }
    }

    public function sendCreateKey(string $server): void
    {
        try {
            $api = new OutlineApiClient($server);
            $key = $api->create();
            $api->setName($key['id'], $this->vpnID);
            $api->setLimit($key['id'], $this->traffic);

            Vpn::query()->where('vpn_id', $this->vpnID)->update([
                'status' => 2,
                'vpn_access_id' => $key['id'],
                'vpn_access_url' => $key['accessUrl'],
            ]);
        } catch (\Exception $e){
            Vpn::query()->where('vpn_id', $this->vpnID)->update([
                'status' => 5
            ]);
        }
    }
}
