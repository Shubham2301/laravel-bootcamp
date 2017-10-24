<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\createRsvpTable;
use App\event;
use App\event_guest;
use DB;

class createRsvpTableController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response = $request->response;
        $invite_id = $request->invite_id;
        $save_response = DB::table('event_guests')
            ->where('id', '=', $invite_id)
            ->update(['RSVP_status' => $response ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function get_rsvp_response($token, $invitation_id)
    {
        $fetch_stored_token = createRsvpTable::select('remember_token')->where('invitation_id','=', $invitation_id)->get();
        $stored_token = $fetch_stored_token[0]->remember_token;
        // $stored_token = Crypt::decrypt($stored_token);
        if($stored_token == $token){
            $get_event_id = event_guest::select('event_id')->where('id', '=', $invitation_id)->get();
            $get_event_id = $get_event_id[0];
            $get_event_details = event::select('*')->where('id', '=', $get_event_id->event_id)->get();
            $get_event_details = $get_event_details[0];
            return view('layouts/rsvp')->with('event', $get_event_details)->with('invite_id', $invitation_id);
        }
        else{
            dd('bye');
        }
    }
}
