<?php

namespace App\Models\Mianzi;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function product()
    {
    	return $this->belongsToMany('App\Models\Mianzi\Product', 'order_products')->withTimestamps();
    }
}
