<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pass extends Model
{
    protected $fillable = [
        'pass', 'length', 'price'
    ];

    public function reservations()
	{
		return $this->hasMany('\App\Reservation');
	}

    protected $table = 'passes';
}
