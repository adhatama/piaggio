<?php
namespace App\Services;


class DateService {
    public function getDateFormat($date)
    {
        return $date->format('l, jS \\of F Y h:i A');
    }
}