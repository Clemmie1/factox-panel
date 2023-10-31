<?php

namespace App\Livewire\Panel\Account;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Rule;
use Livewire\Component;

class UpdatePassword extends Component
{
    use LivewireAlert;

    #[Rule([
        'currentPassword' => 'required|min:6',
    ],
        message: [
            'min' => 'Минимальный пароль 6 символов',
        ],
        onUpdate: true
    )]
    public $currentPassword;

    #[Rule([
        'newPassword' => 'required|min:6',
    ],
        message: [
            'min' => 'Минимальный пароль 6 символов',
        ],
        onUpdate: true
    )]
    public $newPassword;

    #[Rule([
        'confirmPassword' => 'required|min:6',
    ],
        message: [
            'min' => 'Минимальный пароль 6 символов',
        ],
        onUpdate: true
    )]
    public $confirmPassword;

    public function updatePassword()
    {
        $this->validate();
        sleep(1);

        $user = Auth::user();

        if ($this->newPassword != $this->confirmPassword){
            return $this->alert('error', "<a class='text-muted' style='font-weight: bold;'>Пароли не совпадают</a>", [
                'position' => 'bottom-end',
                'timer' => 3000,
                'width' => '300',
                'toast' => true,
            ]);
        }

        if (!Hash::check($this->currentPassword, $user->password)) {
            return $this->alert('error', "<a class='text-muted' style='font-weight: bold;'>Текущий пароль неверен</a>", [
                'position' => 'bottom-end',
                'timer' => 3000,
                'width' => '300',
                'toast' => true,
            ]);
        }

        if (Hash::check($this->newPassword, $user->password)) {
            return $this->alert('error', "<a class='text-muted' style='font-weight: bold;'>Этот пароль уже используется</a>", [
                'position' => 'bottom-end',
                'timer' => 3000,
                'width' => '300',
                'toast' => true,
            ]);
        }

        Auth::user()->update([
            'password' => bcrypt($this->newPassword)
        ]);

        return $this->alert('success', "<a class='text-muted' style='font-weight: bold;'>Пароль был изменен</a>", [
            'position' => 'bottom-end',
            'timer' => 3000,
            'width' => '300',
            'toast' => true,
        ]);
    }

    public function render()
    {
        return view('livewire.panel.account.update-password');
    }
}
