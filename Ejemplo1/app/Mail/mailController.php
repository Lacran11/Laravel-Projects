<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\Mime\Part\Multipart\FormDataPart;

class mailController extends Mailable
{
    use Queueable, SerializesModels;
    public $formData;
    /**
     * Create a new message instance.
     */

    public function __construct($formData)
    {
        $this->formData = $formData;
    }

    /* public function build(){
        return $this->subject('Correo test')
                    ->view('emails.mailForm')
                    ->with('formData',$this->formData);
    }
     */
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('Test@Test.Test', 'Mr. Testing'),
            subject: 'Correo Test',
        );
    }

    /**
     * Get the message content definition.
     */

    public function content(): Content
    {
        return new Content(
            view: 'emails.mailForm',
            with:['formData' => $this->formData]
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
