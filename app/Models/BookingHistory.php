<?php
/**
 * Created by PhpStorm.
 * User: tama
 * Date: 9/18/2015
 * Time: 12:05 AM
 */

namespace App\Models;


use App\Services\DateService;
use App\Models\Vespa;
use Illuminate\Database\Eloquent\Model;

class BookingHistory extends Model
{
    protected $table = 'booking_history';

    protected $fillable = array('name', 'phone', 'email', 'vespa', 'pickup_time', 'return_time', 'quantity', 'price', 'comment');

    public function getPickupTimeString()
    {
        $dateService = new DateService;
        $carbonDate = $dateService->getCarbonDateFromDateString($this->pickup_time, 'Y-m-d H:i:s');

        return $carbonDate->format('d-m-Y H:i:s');
    }

    public function getReturnTimeString()
    {
        $dateService = new DateService;
        $carbonDate = $dateService->getCarbonDateFromDateString($this->pickup_time, 'Y-m-d H:i:s');

        return $carbonDate->format('d-m-Y H:i:s');
    }

    public function getCreatedAtString()
    {
        $dateService = new DateService;
        $carbonDate = $dateService->getCarbonDateFromDateString($this->created_at, 'Y-m-d H:i:s');

        return $carbonDate->format('d-m-Y H:i:s');
    }

    public function getVespaString()
    {
    	$vespasName = [];
    	$vespas = json_decode($this->vespa,true);
    	foreach($vespas as $vespa) {
    	    $v = Vespa::find($vespa['code']);
    	    for ($i=0; $i < $vespa['amount']; $i++) { 
			    array_push($vespasName, $v->name);
    	    }
    	}
        return implode('<br>', $vespasName);
        // return $this->vespa;
    }
}