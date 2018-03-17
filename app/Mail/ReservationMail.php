<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReservationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $reservation;

    public function __construct($reservation)
    {
        $this->reservation =$reservation;    
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $reservation=$this->reservation;
        return $this->view('email.confirmReservation')->with($reservation);
    }
}
