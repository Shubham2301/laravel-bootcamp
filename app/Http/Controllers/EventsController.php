<?php

namespace App\Http\Controllers;

use App\event;
use App\guest;
use App\event_guest;
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
			$events = DB::table('events')->orderBy('date', 'asc')->get();

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
		$event = event::create($request->all());
		return redirect('/');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\events  $events
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$this_event = event::find($id);
		$guest_list = guest::whereDoesntHave('guest_event', function ($query) use($id) {
					    $query->where('event_id', '=', $id);
					})->get();

		return view('events.show',['this_event' => $this_event, 'guest_list' => $guest_list]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\events  $events
	 * @return \Illuminate\Http\Response
	 */
	public function edit(event $events)
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
	public function update(Request $request, event $events)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\events  $events
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(event $events)
	{
		//
	}

	/**
		*show upcoming event on the welcome page
	*/
	public function upcoming()
	{
		$event = DB::table('events')->orderBy('date', 'asc')->where('date','>',NOW())->first();
	
		return view('welcome')->with('event', $event);
	}

	/**
		*send invitation for an event
	*/
	public function invite_guest($event_id, $guest_id)
	{
		$event = event_guest::create([
			'event_id' => $event_id,
			'guest_id' => $guest_id
		]);

		return redirect( '/events/'.$event_id );		
	}
}
