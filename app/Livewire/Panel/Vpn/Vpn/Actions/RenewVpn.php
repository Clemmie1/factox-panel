<?php

namespace App\Livewire\Panel\Vpn\Vpn\Actions;

use App\Models\ObjectStorage;
use App\Models\Vpn;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use \App\Http\Controllers\Billing\Invoice;

class RenewVpn extends Component
{

    use LivewireAlert;

    public $vpnID;
    public $nextDate;
    public $renewPrice = 0.00;

    public function renewVpn()
    {
        sleep(1);


        if (!Invoice::CreateInvoice(
            Auth::user(),
            'VPN',
            $this->vpnID,
            'Продление VPN на 1 месяц',
            $this->renewPrice
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


        Vpn::query()->where('vpn_id', $this->vpnID)->update([
            'expires' => now()->addDay(60),
        ]);


        $this->dispatch('update-info');
        $this->dispatch('hideModal');
        $this->alert('success', "<a class='text-muted' style='font-weight: bold;'>Продленено</a>", [
            'position' => 'bottom-end',
            'timer' => 3000,
            'width' => '200',
            'toast' => true,
        ]);

    }

    public function render()
    {
        $data = json_decode(Storage::get('price/VPN.json'), true);
        $this->renewPrice = $data['renewPrice'];
        return view('livewire.panel.vpn.vpn.actions.renew-vpn');
    }
}
