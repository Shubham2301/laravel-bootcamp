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

	    	return view('guests.allguests')->with('guests', $guests);
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
