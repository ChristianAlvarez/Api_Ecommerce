<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var string
     */
    protected $table = 'city';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'city_id',
        'city_name'
    ];
}
