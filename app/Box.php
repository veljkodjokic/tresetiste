<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
