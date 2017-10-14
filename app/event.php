<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class event extends Model
{
	function event_guest() {
		return $this->belongsToMany('App\guest', 'event_guests')->withPivot('RSVP_status');
	}

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'theme','date','venue'
	];

	public $timestamps = false;
}
