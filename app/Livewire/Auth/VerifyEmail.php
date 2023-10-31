<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Illuminate\Http\Request;

class VerifyEmail extends Component
{

    Use LivewireAlert;

    public $nextResendTime = null;


    public function resend(Request $request)
    {
        if ($this->nextResendTime && now() < $this->nextResendTime) {
            $this->alert('warning', "<a class='text-muted' style='font-weight: bold;'>Вы не можете отправить<br>повторное подтверждение через ". now()->diffInSeconds($this->nextResendTime) ." сек.</a>", [
                'position' => 'bottom-end',
                'timer' => 4000,
                'width' => '350',
                'toast' => true,
                'timerProgressBar' => true,
            ]);
            return;
        }

        sleep(1.5);
        $request->user()->sendEmailVerificationNotification();
        $this->alert('success', "<a class='text-muted' style='font-weight: bold;'>Подтверждение отправлено</a>", [
            'position' => 'bottom-end',
            'timer' => 3000,
            'width' => '300',
            'toast' => true,
        ]);
        // Установите время следующей возможной отправки через 1 минуту
        $this->nextResendTime = now()->addMinutes(3);
    }

    public function logout()
    {
        Auth::logout();
        return $this->redirect(route('auth.login'));
    }

    public function render()
    {
        return view('livewire.auth.verify-email');
    }


}
