<?php

namespace App\Http\Controllers;

use App\events;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;


class EventsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		if(Auth::user())
        {
      		$events = DB::table('events')->get();
			return view('events.allevents')->with('events', $events);
        }
        else
        {
            return view('auth.login');
        }
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
		   return view('events.create');
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
		$event = new events;
		$event->event_name =  request('event_name');
		$event->event_theme =  request('event_theme');
		$event->event_venue =  request('event_venue');
		$event->event_date =  request('event_date');

		$event->save();

		return redirect('/');
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\events  $events
	 * @return \Illuminate\Http\Response
	 */
	public function show(events $events)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\events  $events
	 * @return \Illuminate\Http\Response
	 */
	public function edit(events $events)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\events  $events
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, events $events)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\events  $events
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(events $events)
	{
		//
	}

	/**
		*show upcoming event on the welcome page
	*/
	public function upcoming()
	{
		// dd('hello');
		$event = DB::table('events')->first();
		// dd($events);
		return view('welcome')->with('event', $event);
	}
}
