<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'product_details', 'product_image',
        'secret_key', 'user_id' 
    ];
    public function details()
    {
      return  $this->hasMany('App\ProductDetail', 'product_id');
    }
    public function user()
    {
        $this->belongsTo('App\User', 'user_id');
    }
}
