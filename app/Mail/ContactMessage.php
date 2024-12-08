<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMessage extends Mailable
{
    use SerializesModels;

    public $name;
    public $email;
    public $messageContent;

    /**
     * Create a new message instance.
     *
     * @param  string  $name
     * @param  string  $email
     * @param  string  $messageContent
     * @return void
     */
    public function __construct($name, $email, $messageContent)
    {
        $this->name = $name;
        $this->email = $email;
        $this->messageContent = $messageContent;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Nuevo mensaje de contacto')
                    ->view('emails.contact-message');
    }
}
