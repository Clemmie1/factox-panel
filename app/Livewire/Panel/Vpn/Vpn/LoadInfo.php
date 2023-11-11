<?php

namespace App\Livewire\Panel\Vpn\Vpn;

use App\Models\ObjectStorage;
use App\Models\Vpn;
use Livewire\Attributes\On;
use Livewire\Component;

class LoadInfo extends Component
{

    public $vpnID;

    public $data = null;

    public $vpnName = '';

    public function loadData()
    {
        $this->dispatch('KTComponents');
        sleep(0.1);
        $get = Vpn::query()->where('vpn_id', $this->vpnID)->get();
        $this->vpnName = $get[0]['vpn_name'];
        $this->data = $get;
    }

    #[On('update-info')]
    public function updateInfo()
    {
        $get = Vpn::query()->where('vpn_id', $this->vpnID)->get();
        $this->data = $get;
    }

    public function render()
    {
        return view('livewire.panel.vpn.vpn.load-info', [
            'data' => Vpn::query()->where('vpn_id', $this->vpnID)->get()
        ]);
    }
}
