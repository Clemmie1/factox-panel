<?php

namespace App\Livewire\Panel\Vpn\Vpn\Actions;

use App\Models\ObjectStorage;
use App\Models\Vpn;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Rule;
use Livewire\Component;

class ChangeVpnName extends Component
{

    use LivewireAlert;

    public $vpnID;

    #[Rule('required', message: 'Введите имя сегмента', onUpdate: true)]
    public $newVpnName;


    public function changeVpnName()
    {

        $this->validate();
        Vpn::query()->where('vpn_id', $this->vpnID)->update([
            'vpn_name' => $this->newVpnName
        ]);

        $this->dispatch('update-info');
        $this->reset('newVpnName');
        $this->dispatch('hideModal');

        $this->alert('success', "<a class='text-muted' style='font-weight: bold;'>Сохранено</a>", [
            'position' => 'bottom-end',
            'timer' => 3000,
            'width' => '200',
            'toast' => true,
        ]);

    }

    public function closeModel()
    {
        $this->reset('newVpnName');
    }

    public function render()
    {
        return view('livewire.panel.vpn.vpn.actions.change-vpn-name');
    }
}
