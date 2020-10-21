<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mianzi\Shipping;
use App\Models\Mianzi\Order;
use App\Models\Mianzi\Product;
use App\Models\Mianzi\Customer;
use ShoppingCart;


class OrderController extends Controller
{
    public function checkout()
    {
    	$cart = ShoppingCart::all();
    	$shipping = Shipping::latest()->get();
    	return view('home.checkout.index', 
    		compact('shipping', 'cart')
    	);
    }
}
