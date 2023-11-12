<?php

namespace App\Livewire\Panel\Vpn;

use App\Jobs\CreateObjectStorage;
use App\Models\ObjectStorage;
use App\Models\User;
use App\Models\Vpn;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Nette\Utils\Random;

class CreateVpn extends Component
{

    use LivewireAlert;

    #[Rule('required', message: 'Введите имя')]
    public $name;

    #[Rule('required', message: 'Выберите расположение')]
    public $location;

    #[Rule('required', message: 'Выберите трафик')]
    public $traffic;

    public $price = 0;
    public $label = null;


    public function getSelectTraffic($index)
    {
        $data = json_decode(Storage::get('price/VPN.json'), true);
        if (isset($data['traffic'][$index]['price'])) {
            $this->traffic = $data['traffic'][$index]['traffic_mb'];
            $this->price = $data['traffic'][$index]['price'];
            $this->label = $data['traffic'][$index]['label'];
        }
    }

    public function create()
    {
        $this->validate();

        if ($this->location == 'ca-toronto' or $this->location == 'de'){

            sleep(1);

            $genVpnId = 'vpn-'.Random::generate(15);

            if (!\App\Http\Controllers\Billing\Invoice::CreateInvoice(
                Auth::user(),
                'VPN',
                $genVpnId,
                'Создание VPN, ' . $this->label . ', ' . $this->location,
                $this->price
            ))
            {
                $this->alert('warning', "<a class='text-muted' style='font-weight: bold;'>Не достаточно средств</a>", [
                    'position' => 'bottom-end',
                    'timer' => 3000,
                    'width' => '280',
                    'toast' => true,
                ]);
                return;
            }

            Vpn::query()->create([
                'owner_id' => Auth::id(),
                'vpn_location' => $this->location,
                'vpn_name' => $this->name,
                'vpn_id' => $genVpnId,
                'expires' => now()->addDay(30),
            ]);

            dispatch(new \App\Jobs\CreateVpn($genVpnId, $this->traffic, $this->location));

            $this->hideAll();
        }

    }

    public function closeModel()
    {
        return $this->hideAll();
    }

    public function hideAll()
    {
        $this->dispatch('hideDrawer');
        $this->reset('name');
        $this->reset('location');
        $this->reset('traffic');
    }

    public function render()
    {
        $data = json_decode(Storage::get('price/VPN.json'), true);
        return view('livewire.panel.vpn.create-vpn', [
            'dataPrice' => $data
        ]);
    }
}
