<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class guest extends Model
{

	function guest_event() {
		return $this->belongsToMany('App\event', 'event_guests');
	}

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'email'
	];

	public $timestamps = false;
}
