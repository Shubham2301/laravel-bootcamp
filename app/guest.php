<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class guest extends Model
{
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
