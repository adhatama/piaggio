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

class BookingHistoryController extends Controller
{
    public function index()
    {
        $bookingHistories = BookingHistory::orderBy('created_at', 'desc')->paginate(3);
        $bookingHistories->setPath('bookingHistory');

        return view('bookingHistory.index', compact('bookingHistories'));
    }

    public function approve(Request $request)
    {
        $bookingHistory = BookingHistory::findOrFail($request->input('id'));
        $bookingHistory->status = 1;
        $bookingHistory->save();

        return redirect()->route('bookingHistory.index');
    }
}