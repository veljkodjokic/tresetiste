<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Reservation extends Model
{
    protected $fillable = [
        'name', 'email', 'country', 'address', 'city', 'postalcode', 'comment', 'reserved', 'start', 'end', 'paid', 'status'
    ];

    protected $table = 'reservations';

    public function box()
	{
		return $this->belongsTo('\App\Box');
	}

	public function pass()
	{
		return $this->belongsTo('\App\Pass');
	}

	public function Relevant()
	{
		$start=$this->start;
		$end=$this->end;
		if(Carbon::now()<$start)
			return true;
		if($start<Carbon::now() && Carbon::now()<$end)
			return true;
		return false;
	}
}
