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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('product/type={type}','ProductController@type');
Route::resource('product','ProductController');

Route::get('cart','CartController@index');
Route::post('addtocart/{id}','CartController@store');
Route::delete('cart/{id}','CartController@destroy');

Route::get('history','TransactionController@index');
Route::post('pay','TransactionController@store');

Route::get('type','TypeController@create');
Route::post('type','TypeController@store');
Route::post('type/{id}','TypeController@update');
Route::delete('type/{id}','TypeController@destroy');