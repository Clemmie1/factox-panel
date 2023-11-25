<?php

namespace App\Jobs;

use App\Mail\Support\ClosedTicket;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendCloseTicketSupportJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user_email;
    protected $ticket_id;
    protected $url;

    public function __construct($user_email, $ticket_id, $url)
    {
        $this->user_email = $user_email;
        $this->ticket_id = $ticket_id;
        $this->url = $url;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        sleep(6);
        Mail::mailer('support_smtp')->to($this->user_email)->send(new ClosedTicket($this->ticket_id, $this->url));
    }
}
