<?php

namespace App\Shop;

use Illuminate\Support\Facades\Facade;
use App\Models\Mianzi\Cart;
use Auth;

class Carts extends Facade
{
    public static function get()
    {
    	$cart = Cart::where('customer_id', Auth::guard('customer')->id())->get();
    	return $cart;
    }

    public static function count()
    {
        $count = 0;
    	$cart = Cart::where('customer_id', Auth::guard('customer')->id())->get();
        foreach ($cart as $carts) {
            $count += $carts->qty;
        }
        return $count;
    }

    public static function check()
    {
        $check = Cart::where('customer_id', Auth::guard('customer')->id())->first();
        return $check;
    }

    public static function subtotal()
    {
        $subtotal = 0;
        $cart = Cart::where('customer_id', Auth::guard('customer')->id())->get();
        foreach ($cart as $carts) {
            $subtotal += $carts->qty * $carts->price;
        }
        return $subtotal;

    }
}
