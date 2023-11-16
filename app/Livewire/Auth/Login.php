<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\Attributes\Rule;

class Login extends Component
{

    use LivewireAlert;


    #[Rule('required|email:filter',
        message: [
            'email.required' => 'Введите почту',
            'email.email' => 'Неверный формат почты'
        ],
        onUpdate: true
    )]
    public $email;

    #[Rule('required|min:6',
        message: [
            'password.required' => 'Введите пароль',
            'password.min' => 'Минимальный пароль 6 символов'
        ],
        onUpdate: true
    )]
    public $password;

    public $formLogin = true;
    public $accountBlocked = false;


    public function login()
    {
        $this->validate();

        sleep(1);

        $arr = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (!Auth::validate($arr)){
            $this->alert('error', "<a class='text-muted' style='font-weight: bold;'>Неправильные учетные данные</a>", [
                'position' => 'bottom-end',
                'timer' => 3000,
                'width' => '300',
                'toast' => true,
            ]);
            return;
        }

        $user = User::where('email', $this->email)->first();
        if ($user->blocked){
            $this->formLogin = false;
            $this->accountBlocked = true;
            return;
        }
        Auth::attempt($arr);
        $this->redirect(route('cloud.home'));
        /*if ($user['2fa']){
            $this->redirect(route('auth.verify', [session()->get('token_code')]), true);
        } else {
            Auth::attempt($arr);
            $this->redirect(route('cloud.home'));
        }*/
    }


    public function back()
    {
        return $this->formLogin = true;
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
