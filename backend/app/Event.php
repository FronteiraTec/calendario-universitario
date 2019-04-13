<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        "name", "description", "day", "place"
    ];

    protected $dates = [
        "day"
    ];
}
