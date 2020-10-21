<?php

namespace App\Shop;

use Illuminate\Support\Facades\Facade;
use App\Models\Mianzi\Banner;

class Banners extends Facade
{
    public static function get($type)
    {
    	if ($type == "slider") {
    		$banner = Banner::where('status', '1')->where('type', 'slider')->get();
    		return $banner;
    	}elseif ($type == "collection") {
    		$banner = Banner::where('status', '1')->where('type', 'collection')->get();
    		return $banner;
    	}
    }
}
