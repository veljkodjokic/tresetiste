<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Reservation;

class Box extends Model
{
    protected $fillable = [
        'sector'
    ];

    protected $table = 'boxes';

    public function reservations()
	{
		return $this->hasMany('\App\Reservation');
	}

	public function Busy($my_reservation)
	{
		$reservations=Reservation::where('box_id',$this->id)->get();
		foreach($reservations as $reservation)
		{
			if($reservation->Relevant()){
				$mstart=Carbon::parse($my_reservation->start);
				$mend=Carbon::parse($my_reservation->end);
				$start=Carbon::parse($reservation->start);
				$end=Carbon::parse($reservation->end);
				if($mstart->lte($start) && $my_reservation->end->gte($end))
					return $reservation;
				if($mstart->lte($start) && $mend->lte($end) && $mend->gte($start))
					return $reservation;
				if($mstart->gte($start) && $mend->gte($end) && $mstart->lte($end))
					return $reservation;
				if($mstart->gte($start) && $mend->lte($end))
					return $reservation;
			}
		}
		return false;
	}
}
