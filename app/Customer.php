<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string
     */
    protected $table = 'customer';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id',
        'customer_username',
        'customer_firstname',
        'customer_lastname',
        'customer_photo',
        'customer_phone',
        'customer_address',
        'customer_latitude',
        'customer_longitude',
        'department_id',
        'city_id',
        'IsUpdated'
    ];
}
