<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    protected $fillable = [
        "name", "day", "description"
    ];

    protected $dates = ['day'];
}
