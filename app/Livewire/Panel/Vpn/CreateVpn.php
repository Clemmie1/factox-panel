<?php

namespace App\Livewire\Panel\Vpn;

use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Rule;
use Livewire\Component;

class CreateVpn extends Component
{

    #[Rule('required', message: 'Введите имя')]
    public $name;

    #[Rule('required', message: 'Выберите расположение')]
    public $location;

    public $traffic = 1;

    public function create()
    {
        $this->validate();

        if ($this->location == 'ca' or $this->location == 'de'){
            if ($this->traffic == '1' or $this->traffic == '100' or $this->traffic == '10000'){



            }
        }

    }

    public function render()
    {
        $data = json_decode(Storage::get('price/VPN.json'), true);
        return view('livewire.panel.vpn.create-vpn', [
            'dataPrice' => $data
        ]);
    }
}
