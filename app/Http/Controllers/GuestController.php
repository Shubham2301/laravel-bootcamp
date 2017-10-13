<?php

namespace App\Http\Controllers;

use App\guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;


class GuestController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
	   if(Auth::user())
		{
		   return view('guests.create');
		}
		else
		{
			return view('auth.login');
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		Guest::create($request->all());
		// $event = new events;
		// $event->event_name =  request('event_name');
		// $event->event_theme =  request('event_theme');
		// $event->event_venue =  request('event_venue');
		// $event->event_date =  request('event_date');

		// $event->save();

		return redirect('/');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\guest  $guest
	 * @return \Illuminate\Http\Response
	 */
	public function show(guest $guest)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\guest  $guest
	 * @return \Illuminate\Http\Response
	 */
	public function edit(guest $guest)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\guest  $guest
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, guest $guest)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\guest  $guest
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(guest $guest)
	{
		//
	}
}
