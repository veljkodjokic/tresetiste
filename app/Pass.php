<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pass extends Model
{
    protected $fillable = [
        'pass', 'length', 'price'
    ];

    protected $table = 'passes';
}
