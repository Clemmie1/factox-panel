<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class createVpnCa implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

    protected $vpnID;

    public function __construct($vpnID)
    {
        $this->vpnID = $vpnID;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        sleep(6);



    }
}
