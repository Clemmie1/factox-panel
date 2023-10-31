<?php

namespace App\Livewire\Panel\Account;

use Hitrov\OCI\Signer;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CloseAccount extends Component
{

    public $showAlert = true;

    public function close()
    {
        sleep(6);
        Auth::user()->update([
            'blocked' => 1
        ]);
        $signer = new Signer('', '', '', '');
//        return $this->redirect(\route('auth.login'), true);
    }

    public function render()
    {
        return view('livewire.panel.account.close-account', [
            'isClosed' => \Auth::user()->blocked
        ]);
    }
}
