<?php

namespace App\Helpers;

class DateToDay
{
    public static function toDay($date) : string
    {
        return \DateTime::createFromFormat('Y-d-m H:i:s.u', $date)->format('l');
    }

    public static function toTime($date) : string
    {

        return \DateTime::createFromFormat('Y-d-m H:i:s.u', $date)->format('H:s');
    }
}