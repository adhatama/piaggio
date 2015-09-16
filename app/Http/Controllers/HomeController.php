<?php
/**
 * Created by PhpStorm.
 * User: tama
 * Date: 9/8/2015
 * Time: 10:32 PM
 */

namespace App\Http\Controllers;


class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }
}