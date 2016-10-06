<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');





//testing routes
/*
if (Auth::check()) {
    // The user is logged in...
}
*/

Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware('auth');


/*
Route::get('/my_advertisements', function () {
        return view('my_advertisements');
    })->middleware('auth');
    */

Route::get('/my_advertisements', 'BaseController@my_advertisements')->middleware('auth');

/*
Route::get('/add_advertisement', function () {
        return view('add_advertisement');
    })->middleware('auth');
    */

Route::get('add_advertisement/{id?}', 'BaseController@add_advertisement')->middleware('auth');
Route::get('add_event', 'BaseController@add_event')->middleware('auth');


//posts (new events, new advertisements, new contracts, ...)

Route::post('/new_advertisement', 'BaseController@store_new_advertisement')->middleware('auth');
Route::post('/new_event', 'BaseController@store_new_event')->middleware('auth');

