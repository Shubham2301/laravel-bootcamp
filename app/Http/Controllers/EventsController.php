<?php

namespace App\Http\Controllers;

use App\event;
use App\guest;
use Crypt;
use App\createRsvpTable;
use App\event_guest;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
// use App\Mail\SendInvitations;
// use App\Events\guest_invited;


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

			return view('events.index')->with('events', $events);
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

		return view('events.show',[
			'this_event' => $this_event,
			'guest_list' => $guest_list
		]);
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
	public function invite_guest(event $event, guest $guest)
	{
		$event_id = $event->id;
		$guest_list = guest::whereDoesntHave('guest_event', function ($query) use($event_id) {
						$query->where('event_id', '=', $event_id);
					})->get();

		// if($guest_id === 'invite_all'){
		// 	foreach($guest_list as $guest):
		// 		$event_guest = event_guest::create([
		// 			'event_id' => $event_id,
		// 			'guest_id' => $guest->id
		// 		]);
		// 	endforeach;	
		// }

		// else{
			$event_guest = event_guest::create([
				'event_id' => $event->id,
				'guest_id' => $guest->id
			]);
		// }

		$invitation_id = $event_guest->id;
		$last_guest_email = $guest->email;
		$get_token = event(new \App\Events\guest_invited($invitation_id, $last_guest_email));
		event(new \App\Events\initiate_email($event, $guest, $get_token[0]));

		// $this->send_email($event, $guest);
		return redirect( '/events/'.$event->id );		
	}

	
}
