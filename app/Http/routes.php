<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('home');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


//About page
Route::resource("about","AboutController",['only' => ['index']]);

//Contact page and form
Route::get('contact',
    ['as' => 'contact',
        'uses' => 'ContactController@create']);
Route::post('contact',
    ['as' => 'contact_store',
        'uses' => 'ContactController@store']);

//discounts
Route::resource("discounts","DiscountsController",["only" => ["index"]]);





Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

});
