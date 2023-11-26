<?php

namespace App\Livewire\Panel\Support;

use App\Jobs\SendCloseTicketSupportJob;
use App\Jobs\SendOpenTicketSupportJob;
use App\Mail\Support\ClosedTicket;
use App\Models\SupportTicket;
use App\Models\SupportTicketComment;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class LoadTicketComments extends Component
{

    public $ticketData;
    public $ticketID;
    public $msg;

    public $loadData;

    public function mount()
    {
        $this->loadData = SupportTicketComment::where(['ticket_id' => $this->ticketID])->get();
        $this->ticketData = SupportTicket::where(['ticket_id' => $this->ticketID])->first();
    }

    public function sendComment()
    {

        if ($this->msg == null){
            return;
        }
        SupportTicketComment::create([
           'ticket_id' => $this->ticketID,
           'sender' => 0,
           'msg' => $this->msg,
        ]);
        $this->reset('msg');
        $this->mount();
    }

    public function continue_communication()
    {
        SupportTicket::where('ticket_id', $this->ticketID)->update([
            'ticket_status' => 0
        ]);
        $this->mount();
    }

    public function closeTicket()
    {
        SupportTicket::where('ticket_id', $this->ticketID)->update([
            'ticket_status' => 3
        ]);
        $url = route('support.tickets.viewticket', $this->ticketID);
        $this->mount();
        dispatch(new SendCloseTicketSupportJob(auth()->user()->email, $this->ticketID, $url));
    }

    public function render()
    {
        return view('livewire.panel.support.load-ticket-comments');
    }
}
