<?php

namespace App\Livewire\Panel\Vpn\Vpn\Actions;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class DeleteVpn extends Component
{

    use LivewireAlert;

    public $vpnID;
    public $vpnConfirm;

    public function deleteVpn()
    {
        if ($this->vpnConfirm == null)
        {
            $this->addError('vpnName', 'Введите название');
            return;
        }

        if ($this->vpnConfirm != $this->vpnID)
        {
            $this->addError('vpnName', 'Не верное название');
            return;
        }

        $delete = \App\Http\Controllers\VPN\DeleteVpn::delete($this->vpnID);
        if ($delete){
            return $this->redirect(route('cloud.vpn.home'));
        } else {
            return $this->alert('error', "<a class='text-muted' style='font-weight: bold;'>Ошибка</a>", [
                'position' => 'bottom-end',
                'timer' => 3000,
                'width' => '200',
                'toast' => true,
            ]);
        }

    }

    public function closeModel()
    {
        $this->reset('vpnConfirm');
    }

    public function render()
    {
        return view('livewire.panel.vpn.vpn.actions.delete-vpn');
    }
}
