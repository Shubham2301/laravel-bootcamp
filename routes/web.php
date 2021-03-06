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

Route::get('/', 'EventsController@upcoming');

Auth::routes();


Route::get('/home', 'EventsController@index')->name('Soiree');
Route::get('/events/{event}/invite/{guest}', 'EventsController@invite_guest');
Route::get('/rsvp/{token}/{invitation_id}', 'createRsvpTableController@get_rsvp_response');
Route::resource('response', 'createRsvpTableController');
Route::resource('events', 'EventsController');
Route::resource('guests', 'GuestController');

