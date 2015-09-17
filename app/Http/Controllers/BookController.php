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

class BookController extends Controller
{
    public function index(BookRequest $request, PricingService $pricingService, DateService $dateService)
    {
        $pickupDate = Carbon::createFromFormat(
            'd/m/Y H',
            $request->input('pickupDate') . ' ' . $request->input('pickupTime')
        );
        $pickupDateString = $dateService->getDateFormat($pickupDate);

        $returnDate = Carbon::createFromFormat(
            'd/m/Y H',
            $request->input('returnDate') . ' ' . $request->input('returnTime')
        );
        $returnDateString = $dateService->getDateFormat($returnDate);

        $diffString = $pricingService->getDateDiffString($pickupDate, $returnDate);

        // Calculate Price
        $price = $pricingService->getPriceCalculation($pickupDate, $returnDate, $request->input('quantity'));

        $quantity = $request->input('quantity');

        return view('book.index', compact(
            'pickupDate', 'returnDate',
            'pickupDateString', 'returnDateString',
            'diffString', 'price', 'quantity'));
    }

    public function store(BookStoreRequest $request)
    {
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
            'vespa' => json_encode($vespasName),
            'pickup_date' => $request->input('pickupDate'),
            'return_date' => $request->input('returnDate'),
            'quantity' => $request->input('quantity')
        ]);

        return redirect()->route('book.thankyou');
    }

    public function thankyou()
    {
        return view('book.thankyou');
    }
}