<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $name;

    /**
     * Create a new message instance.
     */
    public function __construct($data, $name)
    {
        $this->data = $data;
        $this->name = $name;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject($this->data['subject']) // Subject dynamic
                    ->view('emails.mail')                    // View file mail.blade.php
                    ->with('data', $this->data)                // Pass data to view
                    ->with('name', $this->name);                // Pass name to view
    }
}
