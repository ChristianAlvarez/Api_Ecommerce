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
        'customer_email',
        'customer_latitude',
        'customer_longitude',
        'department_id',
        'city_id',
        'IsUpdated'
    ];

    public function Department(){
        return $this->belongsTo('App\Department', 'department_id', 'department_id');
    }

    public function City(){
        return $this->belongsTo('App\City', 'city_id', 'city_id');
    }

    public function CompanyCustomer()
    {
        return $this->hasMany('App\CompanyCustomer', 'customer_id', 'customer_id');
    }

    public function Order()
    {
        return $this->hasMany('App\Order', 'customer_id', 'customer_id');
    }

    public function Sale()
    {
        return $this->hasMany('App\Sale', 'customer_id', 'customer_id');
    }
}
