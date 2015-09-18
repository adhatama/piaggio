<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

Route::resource('book', 'BookController');

Route::get('bookingHistory/approve', ['as' => 'bookingHistory.approve', 'uses' => 'BookingHistoryController@approve']);
Route::resource('bookingHistory', 'BookingHistoryController');

Route::get('thankyou', ['as' => 'book.thankyou', 'uses' => 'BookController@thankyou']);