<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string
     */
    protected $table = 'product';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'product_description',
        'product_barcode',
        'product_price',
        'product_image',
        'product_remarks',
        'product_stock',
        'company_id',
        'category_id',
        'tax_id'
    ];

    public function Company(){
        return $this->belongsTo('App\Company', 'company_id', 'company_id');
    }

    public function Category(){
        return $this->belongsTo('App\Category', 'category_id', 'category_id');
    }

    public function Tax(){
        return $this->belongsTo('App\Tax', 'tax_id', 'tax_id');
    }

    public function Inventory()
    {
        return $this->hasManyThrough(
            'App\Product', 'App\Inventory',
            'product_id', 'inventory_id', 'product_id'
        );
    }

}
