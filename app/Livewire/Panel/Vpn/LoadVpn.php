<?php

namespace App\Livewire\Panel\Vpn;

use App\Models\ObjectStorage;
use App\Models\Vpn;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoadVpn extends Component
{

    public $data = null;

    public function loadData()
    {
        $get = Vpn::query()->where('owner_id', Auth::user()->id)->get();
        $this->data = $get;
    }

    public function render()
    {
        return view('livewire.panel.vpn.load-vpn');
    }
}
