<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyCustomer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string
     */
    protected $table = 'companycustomer';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'companycustomer_id',
        'company_id',
        'customer_id'
    ];
}
