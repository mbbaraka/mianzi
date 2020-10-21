<?php

namespace App\Shop;

use Illuminate\Support\Facades\Facade;
use App\Models\Mianzi\PickupStation;
use App\Models\Mianzi\ShippingPrice;
use Auth;

class Shop extends Facade
{
	public static function pickupStation($id)
	{
		$pickups = PickupStation::where('district_id', $id)->get();
		return $pickups;
	}

	public static function pickupFee($id)
	{
		$fee = ShippingPrice::select('fee')->where('station_id', $id)->first();
		return $fee;
	}
}