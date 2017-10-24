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
		if(Auth::user())
		{
			$guests = DB::table('guests')->get();

			return view('guests.index')->with('guests', $guests);
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
		$guest = guest::create($request->all());

		return redirect('/');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\guest  $guest
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$this_guest = guest::find($id);
		// dd($this_guest->guest_event);
		return view('guests.show')->with('this_guest', $this_guest);
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

	// /**
	//  * Show guest list for an event
	//  *
	//  */
	// public function guest_list()
	// {
	// 	$guests = DB::table('guests')->get();

	// 	return view('events.show')->with('guests', $guests);
	// }
}
