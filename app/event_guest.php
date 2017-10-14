<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class event_guest extends Model
{
	function events() {
		return $this->belongsTo('App\event');
	}

	function guests() {
		return $this->belongsTo('App\guest');
	}

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'event_id','guest_id'
    ];

    public $timestamps = false;
}
