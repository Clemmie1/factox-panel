<?php

namespace App\Mail\Support;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CreateNewTicket extends Mailable
{
    use Queueable, SerializesModels;

    public $ticket_id;
    public $ticket_theme;
    public $ticket_category;
    public $ticket_url;

    /**
     * Create a new message instance.
     */
    public function __construct($ticket_id, $ticket_theme, $ticket_category, $ticket_url)
    {
        $this->ticket_id = $ticket_id;
        $this->ticket_theme = $ticket_theme;
        $this->ticket_category = $ticket_category;
        $this->ticket_url = $ticket_url;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Уведомление о создании заявки #'.$this->ticket_id.' в службе поддержки',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'Email.Support.CreateNewTicket',
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
