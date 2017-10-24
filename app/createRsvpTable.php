<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class createRsvpTable extends Model
{
	protected $table = 'rsvp_tables';

    protected $fillable = [
		'invitation_id', 'remember_token', 'invite_id', 'response', 'event_id'
	];
}
