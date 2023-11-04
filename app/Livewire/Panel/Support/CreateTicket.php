<?php

namespace App\Livewire\Panel\Support;

use App\Mail\Support\CreateNewTicket;
use App\Models\SupportTicket;
use App\Models\SupportTicketComment;
use Illuminate\Support\Facades\Mail;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Nette\Utils\Random;

class CreateTicket extends Component
{


    use LivewireAlert;
    #[Rule([
        'ticketTheme' => 'required',
    ],
        message: [
            'required' => 'Введите тему обращения',
        ],
        onUpdate: true
    )]
    public $ticketTheme;

    #[Rule([
        'ticketMsg' => 'required',
    ],
        message: [
            'required' => 'Введите текст обращения',
        ],
        onUpdate: true
    )]
    public $ticketMsg;

    public $ticketPriority;
    public $ticketCategory;


    public function createTicket()
    {
        $this->validate();

        if ($this->ticketPriority == null){
            $this->ticketPriority = 'Низкий';
        }

        if ($this->ticketCategory == null){
            $this->ticketCategory = 'Отдел продаж';
        }

        sleep(1.5);
        $ticket_id = Random::generateInt(10);

        SupportTicket::create([
            'owner_id' => \Auth::user()->id,
            'ticket_id' => $ticket_id,
            'ticket_theme' => $this->ticketTheme,
            'ticket_category' => $this->ticketCategory,
            'ticket_priority' => $this->ticketPriority,
        ]);

        SupportTicketComment::create([
            'ticket_id' => $ticket_id,
            'is_user' => 0,
            'msg' => $this->ticketMsg
        ]);

        $url = route('support.tickets.viewticket', $ticket_id);

        Mail::mailer('support_smtp')->to(\Auth::user()->email)->send(new CreateNewTicket($ticket_id, $this->ticketTheme, $this->ticketCategory, $url));

        return $this->redirect($url);
    }

    public function render()
    {
        return view('livewire.panel.support.create-ticket');
    }
}
