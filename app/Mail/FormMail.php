<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FormMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        //
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    // public function envelope(): Envelope
    // {
    //     return new Envelope(
    //         from: new Address('rentalkostum@gmail.com', 'Rental kostum'),
    //         subject: 'Kontak dari'.$this->data['email'],
    //     );
    // }

    public function build()
    {
        return $this->view('mail.kontakEmail', [
            'data' => $this->data
        ])->subject('Pesan dari Rental Kostum');
    }
}
