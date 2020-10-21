<?php

namespace App\Shop;

use Illuminate\Support\Facades\Facade;
use App\Models\Mianzi\Wishlist;
use Auth;

class Wishlists extends Facade
{
    public static function get()
    {
    	$wishlist = Wishlist::get();
    	return $wishlist;
    }

    public static function count()
    {
    	$wishlist = Wishlist::where('customer_id', Auth::guard('customer')->id())->get();
        $count = count($wishlist);
    	return $count;
    }

    public static function check()
    {
        $check = Wishlist::where('customer_id', Auth::guard('customer')->id())->first();
        return $check;
    }

}
