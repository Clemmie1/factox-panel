<?php

namespace App\Livewire\Panel\Account;

use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class UpdateTwoFactor extends Component
{

    use LivewireAlert;

    public function updateTwoFactor()
    {

        $user = \Auth::user();

        if ($user['2fa']){
            Auth::user()->update([
                '2fa' => 0
            ]);

            return $this->alert('success', "<a class='text-muted' style='font-weight: bold;'>2FA выключен</a>", [
                'position' => 'bottom-end',
                'timer' => 3000,
                'width' => '300',
                'toast' => true,
            ]);
        } else {
            Auth::user()->update([
                '2fa' => 1
            ]);

            return $this->alert('success', "<a class='text-muted' style='font-weight: bold;'>2FA включён</a>", [
                'position' => 'bottom-end',
                'timer' => 3000,
                'width' => '300',
                'toast' => true,
            ]);
        }
    }

    public function render()
    {
        return view('livewire.panel.account.update-two-factor', [
            'isEnabled' => \Auth::user()['2fa'],
        ]);
    }
}
