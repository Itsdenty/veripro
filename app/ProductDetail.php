<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    public function product()
    {
        $this->belongsTo('App\Product', 'product_id');
    }
}
