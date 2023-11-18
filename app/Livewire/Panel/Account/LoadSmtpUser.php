<?php

namespace App\Livewire\Panel\Account;

use App\Models\SmtpUser;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\On;
use Livewire\Component;

class LoadSmtpUser extends Component
{

    #[Lazy]
    public function placeholder()
    {
        return view('Components.Lazy.Account.LoadSmtpUser');
    }

    #[On('update-smtp-user')]
    public function render()
    {
        $list = SmtpUser::query()->limit(3)->where(['owner_id' => \Auth::id()])->orderByDesc('created_at')->get();
        return view('livewire.panel.account.load-smtp-user', [
            'listData' => $list
        ]);
    }
}
