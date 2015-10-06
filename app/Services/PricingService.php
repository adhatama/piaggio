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

    public function getPriceCalculation($startDate, $endDate, $quantity)
    {
        $diff = $startDate->diffInHours($endDate);
        $diffLimitChargedHourly = config('constants.DIFF_LIMIT_CHARGED_HOURLY');

        if ($diff <= 12 + $diffLimitChargedHourly) {
            $pricing = Pricing::where('type', 'halfDay')->first();
        } else if ($diff <= 24 + $diffLimitChargedHourly) {
            $pricing = Pricing::where('type', 'fullDay')->first();
        } else if ($diff <= 48 + $diffLimitChargedHourly) {
            $pricing = Pricing::where('type', 'additional1')->first();
        } else if ($diff <= 72 + $diffLimitChargedHourly) {
            $pricing = Pricing::where('type', 'additional2')->first();
        } else if ($diff <= 96 + $diffLimitChargedHourly) {
            $pricing = Pricing::where('type', 'additional3')->first();
        } else if ($diff <= 120 + $diffLimitChargedHourly) {
            $pricing = Pricing::where('type', 'additional4')->first();
        } else if ($diff <= 144 + $diffLimitChargedHourly) {
            $pricing = Pricing::where('type', 'additional5')->first();
        } else if ($diff <= 168 + $diffLimitChargedHourly) {
            $pricing = Pricing::where('type', 'weekly')->first();
        } else if ($diff < 720 + $diffLimitChargedHourly) {
            $pricing = Pricing::where('type', 'monthly')->first();
        }

        $addedPrice = $this->addedDiffPrice($diff, $pricing->hour);

        $finalPrice = ($pricing->price + $addedPrice) * $quantity;

        return $finalPrice;
    }

    public function addedDiffPrice($diff, $priceTypeDiffHour)
    {
        $addedDiffHour = $diff - $priceTypeDiffHour;

        $addedPrice = 0;
        if($addedDiffHour > 0 && $addedDiffHour <= 5) {
            $addedPrice = Pricing::where('type', 'hourly')->first()->price * $addedDiffHour;
        }

        return $addedPrice;
    }
}