<?php

namespace App\Livewire\Panel\Account;

use App\Http\Controllers\OCI\Email\MessagingEmailController;
use App\Models\SmtpUser;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Rule;
use Livewire\Component;

class CreateUserSmtp extends Component
{

    use LivewireAlert;

    public $dataSmtp = [];

    public $formCreate = true;

    #[Rule('required|max:200',
        message: [
            'smtpName.required' => 'Введите название',
            'smtpName.max' => 'Минимальный 6 символов',
        ],
        onUpdate: true
    )]
    public $smtpName;

    public function createSmtpUser()
    {
        $this->validate();
        $this->formCreate = false;

        $send = MessagingEmailController::CreateSmtpUser(\Auth::user()->oci_user_id);

        if ($send['status'] == 400){
            $this->alert('error', "<a class='text-muted' style='font-weight: bold;'>Ошибка запроса</a>", [
                'position' => 'bottom-end',
                'timer' => 3000,
                'width' => '230',
                'toast' => true,
            ]);
            $this->dataSmtp = [];
            return;
        }


        $this->dispatch('update-smtp-user');
        $this->dataSmtp = [
            'smtp_user' => $send['body']['username'],
            'smtp_user_password' => $send['body']['password'],
        ];

        SmtpUser::query()->create([
            'owner_id' => \Auth::user()->id,
            'smtp_user_id' => $send['body']['id'],
            'smtp_name' => $this->smtpName,
            'smtp_user_name' => $send['body']['username'],
            'smtp_user_password' => $send['body']['password']
        ]);


    }

    public function closeModal()
    {
        $this->reset('smtpName');
        $this->formCreate = true;
    }

    public function render()
    {
        return view('livewire.panel.account.create-user-smtp');
    }
}
