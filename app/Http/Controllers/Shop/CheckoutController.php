<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mianzi\Shipping;
use App\Models\Mianzi\Address;
use App\Models\Mianzi\PickupStation;
use App\Shop\Carts;
use ShoppingCart;
use Auth;
use Alert;

class CheckoutController extends Controller
{
	// public function __construct(){

	// 	$this->middleware('customer');

	// }
    public function index()
    {
    	if (Carts::count() > 0) {
            $carts = Carts::get();
            $shipping = Shipping::where('status', '1')->latest()->get();
            $address =  Address::where('customer_id', auth($guard = 'customer')->id())->where('default', '1')->first();
            $pickup_stations = PickupStation::where('district_id', $address->district_id)->get();
            return view('home.checkout.index', 
                compact('shipping', 'carts','address', 'pickup_stations')
            );
    		
    	}
    	else{
            toast('You have no product to checkout!', 'warning');
            return redirect()->route('shop');
    	}
    }
}
