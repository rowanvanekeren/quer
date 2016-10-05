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
    });

Route::get('/my_advertisements', function () {
        return view('my_advertisements');
    });

Route::get('/add_advertisement', function () {
        return view('add_advertisement');
    });

Route::get('add_advertisement/{id?}', 'BaseController@add_advertisement');



//posts (new events, new advertisements, new contracts, ...)

Route::post('/new_advertisement', 'BaseController@store_new_advertisement');


