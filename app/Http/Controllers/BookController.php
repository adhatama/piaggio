<?php
/**
 * Created by PhpStorm.
 * User: tama
 * Date: 9/13/2015
 * Time: 8:34 PM
 */

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Http\Requests\BookStoreRequest;
use App\Models\BookingHistory;
use App\Models\Vespa;
use App\Services\DateService;
use App\Services\PricingService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BookController extends Controller
{
    public function index(BookRequest $request, PricingService $pricingService, DateService $dateService)
    {
        $pickupDate = $dateService->getCarbonDateFromDateString(
            $request->input('pickupDate') . ' ' . $request->input('pickupTime') . ':00:00',
            'd/m/Y H:i:s'
        );
        $pickupDateString = $pickupDate->format('l, jS \\of F Y h:i A');

        $returnDate = $dateService->getCarbonDateFromDateString(
            $request->input('returnDate') . ' ' . $request->input('returnTime') . ':00:00',
            'd/m/Y H:i:s'
        );
        $returnDateString = $returnDate->format('l, jS \\of F Y h:i A');

        $diffString = $pricingService->getDateDiffString($pickupDate, $returnDate);

        // Calculate Price
        $price = $pricingService->getPriceCalculation($pickupDate, $returnDate, $request->input('quantity'));

        $quantity = $request->input('quantity');

        Mail::send('emails.approval', ['name'=> 'hehe'], function($message) {
            $message->sender(env('SENDER_EMAIL'));
            $message->to('am.adhatama@gmail.com');
            $message->subject('Hi');
        });

        return view('book.index', compact(
            'pickupDate', 'returnDate',
            'pickupDateString', 'returnDateString',
            'diffString', 'price', 'quantity'));
    }

    public function store(BookStoreRequest $request, DateService $dateService, PricingService $pricingService)
    {
//        dd($request->input());
        $pickupDate = $dateService->getCarbonDateFromDateString($request->input('pickupDate'), 'Y-m-d H:i:s');
//        dd($pickupDate);

        $returnDate = $dateService->getCarbonDateFromDateString($request->input('returnDate'), 'Y-m-d H:i:s');

        // Calculate Price
        $price = $pricingService->getPriceCalculation($pickupDate, $returnDate, $request->input('quantity'));

        $vespas = $request->input('vespa');
        $vespasName = [];

        foreach($vespas as $vespa) {
            $v = Vespa::find($vespa);
            $v->status = 1;
            $v->save();

            array_push($vespasName, $v->name);
        }

        BookingHistory::create([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'comment' => $request->input('comment'),
            'vespa' => json_encode($vespasName),
            'pickup_time' => $request->input('pickupDate'),
            'return_time' => $request->input('returnDate'),
            'quantity' => $request->input('quantity'),
            'price' => $price
        ]);

        return redirect()->route('book.thankyou');
    }

    public function thankyou()
    {
        return view('book.thankyou');
    }

    public function emailTest()
    {
        $data['name'] = 'hehe';

        return view('emails.approval', $data);
    }
}