<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Reservation;

class ReservationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $reservation;
    public $price;

    public function __construct(Reservation $reservation, $price)
    {
        $this->reservation =$reservation;    
        $this->price =$price;    
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $reservation=$this->reservation;
        $price=$this->price;
        return $this->view('email.confirmReservation')->with(['reservation'=>$reservation, 'price'=>$price])->subject('Potvrda Rezervacije');
    }
}
