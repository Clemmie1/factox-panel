<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\App;
use Livewire\Component;

class SendVerifyCode extends Component
{


    public function render()
    {
        return view('livewire.auth.send-verify-code');
    }
}
