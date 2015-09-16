<?php
namespace App\Services;

use App\Models\Pricing;

class PricingService {
    public function getDateDiffString($startDate, $endDate)
    {
        $diff = $startDate->diffInHours($endDate);
        $diffString = $diff . ' Hour';
        if($diff >= 24) {
            $diffHourRemaining = $diff % 24;
            $diff = $startDate->diffInDays($endDate);

            $diffString = $diff . ' Day';
            if($diffHourRemaining > 0) {
                $diffString = $diff . ' Day ' . $diffHourRemaining . ' Hour';
            }
        }

        return $diffString;
    }

    public function getPriceCalculation($startDate, $endDate)
    {
        $diff = $startDate->diffInHours($endDate);

        if ($diff <= 12) {
            return Pricing::where('type', 'halfDay')->first();
        } else if ($diff <= 24) {
            return Pricing::where('type', 'fullDay')->first();
        } else if ($diff <= 36) {
            return Pricing::where('type', 'additional1')->first();
        } else if ($diff <= 48) {
            return Pricing::where('type', 'additional2')->first();
        } else if ($diff <= 60) {
            return Pricing::where('type', 'additional3')->first();
        } else if ($diff <= 72) {
            return Pricing::where('type', 'additional4')->first();
        } else if ($diff <= 84) {
            return Pricing::where('type', 'additional5')->first();
        } else if ($diff <= 96) {
            return Pricing::where('type', 'weekly')->first();
        } else {
            return Pricing::where('type', 'monthly')->first();
        }
    }
}