<?php
/**
 * Created by PhpStorm.
 * User: tama
 * Date: 9/18/2015
 * Time: 12:05 AM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class BookingHistory extends Model
{
    protected $table = 'booking_history';

    protected $fillable = array('name', 'phone', 'email', 'vespa', 'pickupDate', 'returnDate', 'quantity');
}