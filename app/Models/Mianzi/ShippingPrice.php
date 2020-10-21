<?php

namespace App\Models\Mianzi;

use Illuminate\Database\Eloquent\Model;
use App\Models\Mianzi\Shipping;
use App\Models\Mianzi\District;

class ShippingPrice extends Model
{
    public function shippings()
    {
    	return $this->belongsTo(Shipping::class);
    }
    
    public function district()
    {
    	return $this->belongsTo(District::class, 'station_id');
    }
}
