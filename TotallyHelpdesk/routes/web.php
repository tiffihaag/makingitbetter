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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/knowledgebase', function () {
    return view('knowledgebase');
});

Route::get('/asset', function () {
    return view('asset');
});


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/addTicket', 'HomeController@addTicket');

Route::post('/home', 'HomeController@addTicket');

Route::get('/home', 'HomeController@ticketList');

Route::get('/ticketing', 'HomeController@ticketList');

Route::get('/editTicket', 'TicketController@editTicket');

Route::get('/updateTicket', 'TicketController@updateTicket');

Route::post('/updateTicket', 'TicketController@updateTicket');

Route::get('/knowledgebase', 'TicketController@completedTicket');

Route::post('/addAsset', 'AssetController@addAsset');

Route::get('/deleteAsset', 'AssetController@deleteAsset');

Route::get('/assets', 'AssetController@assetList');



