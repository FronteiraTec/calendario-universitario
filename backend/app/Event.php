<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public static function whereYearAndMonth($year, $month)
    {
        $filterYear = $year ? $year : now()->year;
        $filterMonth = $month ? $month : now()->month;
        return Event
            ::whereYear('scheduledDay', $filterYear)
            ->whereMonth('scheduledDay', $filterMonth)
            ->orderBy("scheduledDay");
    }

    protected $fillable = [
        "name", "type", "description", "scheduledDay", "scheduledTime", "place"
    ];

    protected $dates = [
        "scheduledDay"
    ];
}
