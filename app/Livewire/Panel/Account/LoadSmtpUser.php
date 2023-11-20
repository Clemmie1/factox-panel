<?php

namespace App\Livewire\Panel\Account;

use App\Http\Controllers\OCI\Email\MessagingEmailController;
use App\Models\SmtpUser;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\On;
use Livewire\Component;

class LoadSmtpUser extends Component
{

    use LivewireAlert;

    #[Lazy]
    public function placeholder()
    {
        return view('Components.Lazy.Account.LoadSmtpUser');
    }

    public function deleteSmtpUserName($id)
    {
        $send = MessagingEmailController::DeleteSmtpUser(\Auth::user()->oci_user_id, $id);
        if ($send['status'] == 404){
            $this->alert('error', "<a class='text-muted' style='font-weight: bold;'>Ошибка запроса</a>", [
                'position' => 'bottom-end',
                'timer' => 3000,
                'width' => '230',
                'toast' => true,
            ]);
            return;
        }
        SmtpUser::query()->where(['smtp_user_id'=>$id])->delete();
        $this->alert('success', "<a class='text-muted' style='font-weight: bold;'>OK</a>", [
            'position' => 'bottom-end',
            'timer' => 3000,
            'width' => '230',
            'toast' => true,
        ]);
        $this->dispatch('update-smtp-user');
    }

    #[On('update-smtp-user')]
    public function render()
    {
        $list = SmtpUser::query()->limit(2)->where(['owner_id' => \Auth::id()])->orderByDesc('created_at')->get();
        return view('livewire.panel.account.load-smtp-user', [
            'listData' => $list
        ]);
    }
}
