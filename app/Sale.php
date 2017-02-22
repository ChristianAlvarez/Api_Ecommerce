<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string
     */
    protected $table = 'sale';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sale_id',
        'company_id',
        'customer_id',
        'warehouse_id',
        'state_id',
        'order_id',
        'sale_date',
        'sale_remarks'
    ];
}
