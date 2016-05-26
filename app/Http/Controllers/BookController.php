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
    	$oriPickupDate = $request->input('pickupDate');
    	$oriReturnDate = $request->input('returnDate');
        $pickupDate = $dateService->getCarbonDateFromDateString(
            $request->input('pickupDate') ,
            'Y-m-d H:i:s'
        );
        $pickupDateString = $pickupDate->format('l, jS \\of F Y h:i A');

        $returnDate = $dateService->getCarbonDateFromDateString(
            $request->input('returnDate'),
            'Y-m-d H:i:s'
        );
        $returnDateString = $returnDate->format('l, jS \\of F Y h:i A');

        $diffString = $pricingService->getDateDiffString($pickupDate, $returnDate);

        // Calculate Price
        $price = $pricingService->getPriceCalculation($pickupDate, $returnDate, $request->input('quantity'));

        $quantity = $request->input('quantity');
        $city = $request->input('city');

        $vespa = Vespa::where('status', '0')->get();
        $avesp = 0;
        foreach ($vespa as $vesp) {
        	$avesp = $avesp+$vesp->stock;
        }

//        Mail::send('emails.approval', ['name'=> 'hehe'], function($message) {
//            $message->sender(env('SENDER_EMAIL'));
//            $message->to('am.adhatama@gmail.com');
//            $message->subject('Hi');
//        });
        // dd($avesp);

        return view('book.book', compact(
            'pickupDate', 'returnDate','oriPickupDate', 'oriReturnDate',
            'pickupDateString', 'returnDateString',
            'diffString', 'city', 'price', 'quantity', 'vespa', 'avesp'));

        // dd($avesp);

    }

    public function store(Request $request, DateService $dateService, PricingService $pricingService)
    {
    	// $vesp = json_decode($request->input('vespa'),true);
       // dd($request->input());

        $pickupDate = $dateService->getCarbonDateFromDateString($request->input('pickupDate'), 'Y-m-d H:i:s');
       // dd($pickupDate);

        $returnDate = $dateService->getCarbonDateFromDateString($request->input('returnDate'), 'Y-m-d H:i:s');

        // Calculate Price
        $price = $pricingService->getPriceCalculation($pickupDate, $returnDate, $request->input('quantity'));

        $vespas = json_decode($request->input('vespa'),true);
        $vespasName = [];

        foreach($vespas as $vespa) {
            $v = Vespa::find($vespa['code']);
            $initStock = $v->stock;
            $stock = $initStock-$vespa['amount'];
            $v->stock = $stock;
            $v->save();

        	// dd($vespa['code']);
            array_push($vespasName, $v->name);
        }

        BookingHistory::create([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'comment' => $request->input('comment'),
            'vespa' => $request->input('vespa'),
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

    public function change_date(Request $request, DateService $dateService) {
    	$newDate = $request->input('date');
    	$convertDate = $dateService->getCarbonDateFromDateString(
    	    $request->input('date') ,
    	    'Y-m-d H:i:s'
    	);
    	$convertDateString = $convertDate->format('l, jS \\of F Y h:i A');
    	return $convertDateString;
    }
}