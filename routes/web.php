<?php

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
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('home');
});

Route::get('query2', function () {
	$calanderevents = DB::table('events')->get();
    return view('query2', ['calanderevents' => $calanderevents]);
});

Route::post('query2', 'EventsController@home');