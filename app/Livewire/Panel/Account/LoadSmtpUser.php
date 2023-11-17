<?php

namespace App\Livewire\Panel\Account;

use App\Models\SmtpUser;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Lazy;
use Livewire\Component;

class LoadSmtpUser extends Component
{

    use LivewireAlert;

    #[Lazy]
    public function placeholder()
    {
        return view('Components.Lazy.Account.LoadSmtpUser');
    }

    public function copyText()
    {
        $this->alert('success', "<a class='text-muted' style='font-weight: bold;'>Скопировано в буфер обмен</a> ", [
            'position' => 'bottom-end',
            'timer' => 3000,
            'width' => '300',
            'toast' => true,
        ]);
    }

    public function render()
    {
        sleep(0.5);
        $list = SmtpUser::query()->limit(3)->where(['owner_id' => \Auth::id()])->orderByDesc('created_at')->get();
        return view('livewire.panel.account.load-smtp-user', [
            'listData' => $list
        ]);
    }
}
