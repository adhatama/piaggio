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

// Authentication routes...
Route::get('login', ['as' => 'login.get', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('auth/login', ['as' => 'login.post', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);

Route::resource('book', 'BookController');

Route::get('thankyou', ['as' => 'book.thankyou', 'uses' => 'BookController@thankyou']);

Route::group(['middleware' => 'auth'], function() {
    Route::get('bookingHistory/approve', ['as' => 'bookingHistory.approve', 'uses' => 'BookingHistoryController@approve']);
    Route::resource('bookingHistory', 'BookingHistoryController');

    Route::get('emailTest', ['as' => 'book.emailTest', 'uses' => 'BookController@emailTest']);
});