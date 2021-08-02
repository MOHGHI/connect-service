<?php

use Faker\Factory;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Route::get('/', function () {
//    $user = \App\City::find(1);
//    return $user->addresses()->get();
//});

Route::get('/', 'CityController@index')->name('home');
Route::post('/cities', 'CityController@getCities')->name('loadCities');
Route::post('/operators', 'CityController@getOffers')->name('loadOffers');
Route::post('/conditions', 'CityController@getconditions')->name('loadConditions');
Route::post('/request', 'RequestController@store')->name('addRequest');
Route::post('/show/{id}', 'RequestController@show')->name('showRequest');
