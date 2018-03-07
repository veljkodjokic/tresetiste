<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'img', 'album_id'
    ];

    public function show()
	{
		return $this->belongsTo('\App\Album');
	}

	protected $table = 'images';
}
