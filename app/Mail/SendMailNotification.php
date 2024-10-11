<?php

namespace App\Mail;

use App\DTOs\MailData;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendMailNotification extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $tries = 5;
    /**
     * Create a new message instance.
     */
    public function __construct(
        private MailData $mailData
    )
    {
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Vaccine Appointment Notification',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.vaccine_notification',
            with: [
                'name' => $this->mailData->user_name,
                'date' => $this->mailData->date,
                'address' => $this->mailData->address,
                'center' => $this->mailData->center_name
            ],
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

    public function backoff(): array
    {
        return [1, 5, 10];
    }
}
