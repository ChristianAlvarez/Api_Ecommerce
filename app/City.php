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
        'city_name',
        'department_id'
    ];

    public function Department(){
        return $this->hasOne('App\Department', 'department_id', 'department_id');
    }
}
