<?php

namespace App\Models\Mianzi;

use Illuminate\Database\Eloquent\Model;
use App\Models\Mianzi\ShippingPrice;
use App\Models\Mianzi\Order;

class Shipping extends Model
{
    public function shippingprice()
    {
    	return $this->hasMany(ShippingPrice::class);
    }
    public function orders()
    {
    	return $this->hasMany(Order::class);
    }
}
