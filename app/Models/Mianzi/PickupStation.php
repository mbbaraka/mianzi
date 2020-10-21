<?php

namespace App\Models\Mianzi;

use Illuminate\Database\Eloquent\Model;
use App\Models\Mianzi\District;
use App\Models\Mianzi\ShippingPrice;

class PickupStation extends Model
{
    public function district()
    {
    	return $this->belongsTo(District::class);
    }

    public function shipping()
    {
    	return $this->hasMany(ShippingPrice::class, 'station_id');
    }
}
