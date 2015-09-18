<?php
namespace App\Services;


use Carbon\Carbon;

class DateService {

    public function getCarbonDateFromDateString($dateString, $format)
    {
        return Carbon::createFromFormat($format, $dateString);
    }

    // Long format: l, jS \\of F Y h:i A
    public function getDateFormat($date, $format)
    {
        return $date->format('');
    }
}