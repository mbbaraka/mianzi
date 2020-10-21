<?php

namespace App\Models\Mianzi;

use Illuminate\Database\Eloquent\Model;
use App\Models\Mianzi\Region;
use App\Models\Mianzi\PickupStation;
use App\Models\Mianzi\ShippingPrice;

class District extends Model
{
   	public function region()
    {
    	return $this->belongsTo(Region::class);
    }

    public function pickupStation()
    {
    	return $this->hasMany(PickupStation::class);
    }

    public function shipping()
    {
    	return $this->hasMany(ShippingPrice::class, 'station_id');
    }
}
