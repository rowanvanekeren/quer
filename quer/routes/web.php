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

/*Route::get('/', function () {
    return view('home');
});*/
Route::get('/', 'BaseController@get_homepage');

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

Route::get('/edit_account', 'AccountController@edit_account')->middleware('auth');

Route::get('/my_advertisements', 'BaseController@my_advertisements')->middleware('auth');

Route::get('/advert_overview/{id?}', 'BaseController@get_advert_overview');


/*
Route::get('/add_advertisement', function () {
        return view('add_advertisement');
    })->middleware('auth');
    */

Route::get('add_advertisement/{id?}', 'BaseController@add_advertisement')->middleware('auth');
Route::get('add_event', 'BaseController@add_event')->middleware('auth');


//posts (new events, new advertisements, new contracts, ...)
//homepage posts
Route::post('/homepage_search', 'BaseController@homepage_search');

//admin posts
Route::post('/update_account', 'AccountController@update_account')->middleware('auth');
Route::post('/new_advertisement', 'BaseController@store_new_advertisement')->middleware('auth');
Route::post('/new_event', 'BaseController@store_new_event')->middleware('auth');

