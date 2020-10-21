<?php

namespace App\Shop;

use Illuminate\Support\Facades\Facade;
use App\Models\Mianzi\Compare;
use Auth;

class Compares extends Facade
{
    public static function get()
    {
    	$compare = Compare::get();
    	return $compare;
    }

    public static function count()
    {
    	$compare = Compare::where('customer_id', Auth::guard('customer')->id())->get();
        $count = count($compare);
    	return $count;
    }

    public static function check()
    {
        $check = Compare::where('customer_id', Auth::guard('customer')->id())->first();
        return $check;
    }
}
