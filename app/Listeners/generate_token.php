<?php

namespace App\Listeners;

use App\Events\guest_invited;
use App\createRsvpTable;
use Crypt;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class generate_token
{
	/**
	 * Create the event listener.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the event.
	 *
	 * @param  guest_invited  $event
	 * @return void
	 */
	public function handle(guest_invited $event)
	{
		$random_string = str_random(32);
		// $encrypted_random_string = Crypt::encrypt($random_string);
		$invitation_id = $event->invitation_id;
		$token = url('/')."/rsvp/".$random_string."/".$invitation_id;
		$this->invitation_entry($invitation_id, $random_string);
		return $token;
	}

	public function invitation_entry($invitation_id, $ticket){
		$invitation_entry = createRsvpTable::create([
			'invitation_id' => $invitation_id,
			'remember_token' => $ticket
		]);
	}
}
