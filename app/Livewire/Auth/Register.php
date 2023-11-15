<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Rule;
use Livewire\Component;
use \Illuminate\Database\QueryException;

class Register extends Component
{

    use LivewireAlert;

    #[Rule('required|max:10',
        message: [
            'name.required' => 'Введите Имя',
            'name.max' => 'Максимально 10 символов'
        ],
        onUpdate: true
    )]
    public $name;

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

    public $formRegister = true;

    public function reg()
    {

        $this->validate();
        sleep(0.5);

        try {
            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => bcrypt($this->password),
            ]);

            $this->alert('success', "<a class='text-muted' style='font-weight: bold;'>Подтверждение отправлено</a>", [
                'position' => 'bottom-end',
                'timer' => 3000,
                'width' => '300',
                'toast' => true,
            ]);

            \Auth::login($user);
            event(new Registered($user));
            $this->formRegister = false;
        } catch (QueryException $e) {
            $this->alert('error', "<a class='text-muted' style='font-weight: bold;'>Почта занята</a>", [
                'position' => 'bottom-end',
                'timer' => 3000,
                'width' => '300',
                'toast' => true,
            ]);
        }

    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
