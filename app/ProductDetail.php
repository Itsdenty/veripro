<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    protected $fillable = [
        'product_id', 'batch_number', 'trading_number' 
    ];
    public function product()
    {
        $this->belongsTo('App\Product', 'product_id');
    }
}
