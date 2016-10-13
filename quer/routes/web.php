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
Route::get('/quer_overview/{id}', 'BaseController@get_quers_overview')->middleware('auth');

Route::get('/advert_overview/{id?}', 'BaseController@get_advert_overview');

Route::get('/contracts_overview', 'BaseController@get_contracts_overview')->middleware('auth');
Route::get('/contract_details/{id}', 'BaseController@get_contract_details')->middleware('auth');


//test route -> can be used for whatever you want to test
//Route::get('/test/{id}', 'BaseController@get_amount_of_quers');


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
Route::post('/new_contract', 'BaseController@store_new_contract')->middleware('auth');

