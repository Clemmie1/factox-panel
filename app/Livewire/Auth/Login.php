<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\Attributes\Rule;

class Login extends Component
{

    use LivewireAlert;

    public $formLogin = true;
    public $accountBlocked = false;

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
    public $code;



    public function login()
    {
        $this->validate();

        sleep(1);

        $arr = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (Auth::attempt($arr)){
            $user = Auth::user();
            if (!$user->blocked){
                Auth::login($user);
                return $this->redirect(route('cloud.home'));
            } else {
                $this->formLogin = false;
                $this->accountBlocked = true;
                $this->alert('error', "<a class='text-muted' style='font-weight: bold;'>Ошибка входа в аккаунт</a>", [
                    'position' => 'bottom-end',
                    'timer' => 3000,
                    'width' => '300',
                    'toast' => true,
                ]);
            }
        } else {
            $this->alert('error', "<a class='text-muted' style='font-weight: bold;'>Неправильные учетные данные</a>", [
                'position' => 'bottom-end',
                'timer' => 3000,
                'width' => '300',
                'toast' => true,
            ]);
        }

        /*$this->alert('success', "<a class='text-muted' style='font-weight: bold;'>Проверочный код отправлен</a>", [
            'position' => 'bottom-end',
            'timer' => 3000,
            'width' => '300',
            'toast' => true,
        ]);
        $this->formLogin = false;*/
    }

    public function loginSec()
    {
        $this->validate(
            [
                'code' => ['required'],
            ],
            [
            ],
        );
        sleep(2);
        $this->alert('error', "<a class='text-muted' style='font-weight: bold;'>Неверный проверочный код</a>", [
            'position' => 'bottom-end',
            'timer' => 3000,
            'width' => '300',
            'toast' => true,
        ]);
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
