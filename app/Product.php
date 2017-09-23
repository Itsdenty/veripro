<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function details()
    {
      return  $this->hasMany('App\ProductDetail', 'product_id');
    }
    public function user()
    {
        $this->belongsTo('App\User', 'user_id');
    }
}
