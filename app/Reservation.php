<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'name', 'email', 'country', 'city', 'postalcode', 'reserved', 'start', 'end', 'paid'
    ];

    protected $table = 'reservations';

    public function box()
	{
		return $this->belongsTo('\App\Box');
	}
}
