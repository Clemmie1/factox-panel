<?php

namespace App\Mail\Support;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ClosedTicket extends Mailable
{
    use Queueable, SerializesModels;

    public $ticket_id;
    public $ticket_url;

    public function __construct($ticket_id, $ticket_url)
    {
        $this->ticket_id = $ticket_id;
        $this->ticket_url = $ticket_url;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Уведомление о закрытии заявки #'.$this->ticket_id.' в службе поддержки',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'Email.Support.ClosedTicket',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
