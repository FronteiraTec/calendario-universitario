<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        "name", "type", "description", "scheduledDay", "scheduledTime", "place"
    ];

    protected $dates = [
        "scheduledDay"
    ];
}
