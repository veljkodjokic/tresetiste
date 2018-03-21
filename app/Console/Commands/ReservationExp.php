<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use \App\Reservation;
use Carbon\Carbon;

class ReservationExp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ReservationExp';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deletes all resevations that have not been confirmed within the 2 hours.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $exp=Carbon::now()->subHours(2);
        $reservations=Reservation::where('created_at','<',$exp)->where('status','=',0)->get();
        foreach ($reservations as $reservation) {
            $reservation->delete();
        }

        $exp=Carbon::now()->subDays(2);
        $reservations=Reservation::where('created_at','<',$exp)->where('paid','=',0)->get();
        foreach ($reservations as $reservation) {
            $reservation->delete();
        }

        $this->info('Hourly removal of expired reservations due to a failure to confirm them has been successfully completed!');
    }
}
