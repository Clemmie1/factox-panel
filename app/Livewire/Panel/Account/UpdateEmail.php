<?php

namespace App\Livewire\Panel\Account;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Rule;
use Livewire\Component;

class UpdateEmail extends Component
{

    use LivewireAlert;

    #[Rule([
        'email' => 'required|email:filter',
    ],
        message: [
            'email' => 'Неверный формат почты',
        ],
        onUpdate: true
    )]
    public $email;

    #[Rule([
        'password' => 'required|min:6',
    ],
        message: [
            'min' => 'Минимальный пароль 6 символов',
        ],
        onUpdate: true
    )]
    public $password;


    public function updateEmail()
    {
        $this->validate();
        sleep(1);

        $user = Auth::user();

        if ($this->email == $user->email){
            return $this->alert('error', "<a class='text-muted' style='font-weight: bold;'>Введите другую почту</a>", [
                'position' => 'bottom-end',
                'timer' => 3000,
                'width' => '300',
                'toast' => true,
            ]);
        }

        if (!Hash::check($this->password, $user->password)) {
            return $this->alert('error', "<a class='text-muted' style='font-weight: bold;'>Текущий пароль неверен</a>", [
                'position' => 'bottom-end',
                'timer' => 3000,
                'width' => '300',
                'toast' => true,
            ]);
        }

        Auth::user()->update([
            'email' => $this->email
        ]);

        return $this->alert('success', "<a class='text-muted' style='font-weight: bold;'>Почта изменена</a>", [
            'position' => 'bottom-end',
            'timer' => 3000,
            'width' => '300',
            'toast' => true,
        ]);
    }

    public function render()
    {
        return view('livewire.panel.account.update-email');
    }
}
