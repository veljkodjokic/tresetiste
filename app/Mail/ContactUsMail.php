<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactUsMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $formular;

    public function __construct($formular)
    {
        $this->formular =$formular;    
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $formular=$this->formular;
        return $this->view('email.contact')->with($formular);
    }
}
