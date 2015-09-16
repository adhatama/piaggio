<?php
/**
 * Created by PhpStorm.
 * User: tama
 * Date: 9/13/2015
 * Time: 8:34 PM
 */

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
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
        $price = $pricingService->getPriceCalculation($pickupDate, $returnDate, $request->quantity);

        return view('book.index', compact('pickupDateString', 'returnDateString', 'diffString', 'price'));
    }

    public function store()
    {

    }

    public function thankyou()
    {

    }
}