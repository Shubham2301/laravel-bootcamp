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
Route::get('/events/{e_id}/invite/{g_id}', 'EventsController@invite_guest');
Route::resource('events', 'EventsController');
Route::resource('guests', 'GuestController');

