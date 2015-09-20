<?php
/**
 * Created by PhpStorm.
 * User: tama
 * Date: 9/19/2015
 * Time: 4:53 AM
 */

namespace App\Http\Controllers;


use App\Models\BookingHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BookingHistoryController extends Controller
{
    public function index()
    {
        $bookingHistories = BookingHistory::orderBy('created_at', 'desc')->paginate(15);
        $bookingHistories->setPath('bookingHistory');

        return view('bookingHistory.index', compact('bookingHistories'));
    }

    public function approve(Request $request)
    {
        $bookingHistory = BookingHistory::findOrFail($request->input('id'));
        $bookingHistory->status = 1;
        $bookingHistory->save();

        $data = [
            'name' => $bookingHistory->name,
            'phone' => $bookingHistory->phone,
            'email' => $bookingHistory->email,
            'pickupDate' => $bookingHistory->getPickupTimeString(),
            'returnDate' => $bookingHistory->getReturnTimeString(),
            'price' => $bookingHistory->price,
        ];

//        Mail::send('emails.approval', $data, function ($message) {
//            $message->subject('Your Vespa Booking Has Been Approved');
//            $message->from(env('SENDER_EMAIl'), 'Vespa');
//            $message->to('akbar@javan.co.id');
//        });

        return redirect()->route('bookingHistory.index');
    }
}