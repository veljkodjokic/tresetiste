<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use \App\Reservation;
use Carbon\Carbon;

class NotPaid extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'NotPaid';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deletes all resevations that have not been paid within 2 days.';

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
        $exp=Carbon::now()->subDays(2);
        $reservations=Reservation::where('created_at','<',$exp)->where('paid','=',0)->get();
        foreach ($reservations as $reservation) {
            $reservation->delete();
        }

        $this->info('Daily removal of expired reservations due to a failure to pay them has been successfully completed!');
    }
}
