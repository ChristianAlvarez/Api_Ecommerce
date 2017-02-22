<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var string
     */
    protected $table = 'company';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id',
        'company_name',
        'company_phone',
        'company_address',
        'company_logo',
        'department_id',
        'city_id'
    ];

}
