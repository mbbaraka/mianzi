<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mianzi\Wishlist;
use Auth;

class WishlistController extends Controller
{
	// public function __construct()
 //    {
 //        $this->middleware('guest:customer');
 //    }

    public function index()
    {
    	$wishlist = Wishlist::where('customer_id', Auth::guard('customer')->id())->get();
    	return view('home.account.wishlist', compact('wishlist'));
    }

    public function destroy($id)
    {
    	$wishlist = Wishlist::find($id);
    	$delete= $wishlist->delete();
    	if ($delete) {
    		toast('Product removed from wishlist successfully', 'success');
    		return redirect()->back();
    	}
    }
}
