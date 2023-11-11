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
        sleep(1);
        if ($this->location = 'ca-toronto'){
            sleep(2);
            try {
                $server = 'https://168.138.70.14:11493/AfHcGvKFa8PY1RduJ1by4Q';
                $api = new OutlineApiClient($server);
                $key = $api->create();
                $api->setName($key['id'], $this->vpnID);
                $api->setLimit($key['id'], $this->traffic);

                Vpn::query()->where('vpn_id', $this->vpnID)->update([
                    'status' => 2,
                    'vpn_access_id' => $key['id'],
                    'vpn_access_url' => $key['accessUrl'],
                ]);

            } catch (\Exception $e) {

            }
        }
    }
}
