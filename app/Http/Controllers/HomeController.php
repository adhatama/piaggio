<?php
/**
 * Created by PhpStorm.
 * User: tama
 * Date: 9/8/2015
 * Time: 10:32 PM
 */

namespace App\Http\Controllers;


use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $now = Carbon::now();
        $tomorrow = Carbon::tomorrow();

        $nowString = '';//$now->format('d/m/Y 10:00');
        $tomorrowString = '';//$tomorrow->format('d/m/Y 10:00');

        return view('home.index-v3', compact('nowString', 'tomorrowString'));
    }
}