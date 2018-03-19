<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CanceledReservation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $reservation;
    public $admin;

    public function __construct($reservation, $admin)
    {
        $this->reservation =$reservation;    
        $this->admin =$admin;    
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $reservation=$this->reservation;
        $admin=$this->admin;
        return $this->view('email.canceled')->with(['reservation'=>$reservation,'admin'=>$admin])->subject('Ukinuta Rezervacija');
    }
}
