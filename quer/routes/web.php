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
Route::get('/get_homepage_with_login', 'BaseController@get_homepage_with_login');


Route::get('/home', 'HomeController@index');


Route::post('/homepage_search', 'BaseController@search_quer');

Auth::routes();
//testing routes
/*
if (Auth::check()) {
    // The user is logged in...
}
*/


Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    });
    
    Route::get('/users_overview', 'BaseController@get_all_users');
    Route::get('/delete_user/{id}', 'BaseController@delete_user');
    Route::get('/delete_event/{id}', 'EventController@delete_event');
    
    Route::get('/edit_account', 'AccountController@edit_account');

    Route::get('/my_advertisements', 'AdvertisementController@my_advertisements');
    Route::get('/quer_overview/{id}', 'ContractController@get_quers_overview');

    Route::get('/advert_overview/{id?}', 'BaseController@get_advert_overview');

    Route::get('/contracts_overview', 'ContractController@get_contracts_overview');
    Route::get('/contract_details/{id}', 'ContractController@get_contract_details');

    Route::get('/update_contract/{id}', 'ContractController@update_contracts');

    Route::get('/user_details/{id}', 'BaseController@get_user_with_adv_rev');

    Route::get('/download_ticket/{id}', ['as' => 'download_ticket', 'uses' => 'ContractController@download_ticket']);
    
    Route::get('add_advertisement/{id?}', 'AdvertisementController@add_advertisement');
    Route::get('add_event', 'EventController@add_event');
    Route::post('/update_account', 'AccountController@update_account');
    Route::post('/new_advertisement', 'AdvertisementController@store_new_advertisement');
    Route::post('/new_event', 'EventController@store_new_event');
    Route::post('/new_contract', 'ContractController@store_new_contract');
    Route::post('/upload_ticket', 'ContractController@upload_ticket');
    Route::post('/accept_ticket', 'ContractController@accept_ticket');

    Route::post('/add_review', 'ReviewController@add_Review');
    
});

/*
Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware('auth');



Route::get('/my_advertisements', function () {
        return view('my_advertisements');
    })->middleware('auth');
    

Route::get('/edit_account', 'AccountController@edit_account')->middleware('auth');

Route::get('/my_advertisements', 'AdvertisementController@my_advertisements')->middleware('auth');
Route::get('/quer_overview/{id}', 'ContractController@get_quers_overview')->middleware('auth');

Route::get('/advert_overview/{id?}', 'BaseController@get_advert_overview')->middleware('auth');

Route::get('/contracts_overview', 'ContractController@get_contracts_overview')->middleware('auth');
Route::get('/contract_details/{id}', 'ContractController@get_contract_details')->middleware('auth');

Route::get('/update_contract/{id}', 'ContractController@update_contracts')->middleware('auth');

Route::get('/user_details/{id}', 'BaseController@get_user_with_adv_rev');

Route::get('/download_ticket/{id}', ['as' => 'download_ticket', 'uses' => 'ContractController@download_ticket'])->middleware('auth');
*/



//test route -> can be used for whatever you want to test
//Route::get('/test/{id}', 'ContractController@get_quers_overview');


/*
Route::get('/add_advertisement', function () {
        return view('add_advertisement');
    })->middleware('auth');
    */
/*
Route::get('add_advertisement/{id?}', 'AdvertisementController@add_advertisement')->middleware('auth');
Route::get('add_event', 'EventController@add_event')->middleware('auth');


//posts (new events, new advertisements, new contracts, ...)
//homepage posts
//Route::post('/homepage_search', 'BaseController@homepage_search');
Route::post('/homepage_search', 'BaseController@search_quer');

//admin posts
Route::post('/update_account', 'AccountController@update_account')->middleware('auth');
Route::post('/new_advertisement', 'AdvertisementController@store_new_advertisement')->middleware('auth');
Route::post('/new_event', 'EventController@store_new_event')->middleware('auth');
Route::post('/new_contract', 'ContractController@store_new_contract')->middleware('auth');
Route::post('/upload_ticket', 'ContractController@upload_ticket');
Route::post('/accept_ticket', 'ContractController@accept_ticket');

Route::post('/add_review', 'ReviewController@add_Review');


//test
Route::get('/test', 'ContractController@accept_ticket');

Route::get('/test', function () {
    return view('test');
});
*/