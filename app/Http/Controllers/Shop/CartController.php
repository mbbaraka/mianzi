<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ShoppingCart;
use Alert;
use Auth;
use App\Models\Mianzi\Product;
use App\Models\Mianzi\Cart;

class CartController extends Controller
{
	public function index()
	{
        if (!Auth::guard('customer')->check()) {
    		$cart = ShoppingCart::all();
    		return view('home.cart.index', compact('cart'));
        }else{
            $cart = Cart::where('customer_id', Auth::guard('customer')->id())->get();
            return view('home.cart.index', compact('cart'));
        }

	}

    public function addToCart(Request $request, $id)
    {

    	if (!Auth::guard('customer')->check()) {
            $products = Product::find($id);
            $attributes = ['cover' => $products->cover, 'slug' => $products->slug];

            if ($products->sale_price != "") {
                $price = $products->sale_price;
            }else{
                $price = $products->price;  
            }

            ShoppingCart::add($products->id, $products->title, $request->qty, $price, $attributes);
            toast('Product successfully added to cart', 'success');
            // alert()->success('SuccessAlert','Product successfully added to cart');
            return redirect()->back();
        }else{
            
            $check = Cart::where('product_id', $id)->first();
            if ($check) {
                $cart = Cart::find($check->id);
                $cart->customer_id = Auth::guard('customer')->id();
                $cart->product_id = $id;
                $cart->price = $request->price;
                $cart->qty = ($cart->qty + $request->qty);
                $save = $cart->save();

            }else{
                $cart = new Cart();
                $cart->customer_id = Auth::guard('customer')->id();
                $cart->product_id = $id;
                $cart->price = $request->price;
                $cart->qty = $request->qty;
                $save = $cart->save();
            }
            //check if product in wishlist
            // $check_wish = Wishlist::where('product_id' )->first();
            toast('Product successfully added to cart', 'success');
            return redirect()->back();

        }
    }

    public function updateCart(Request $request, $id)
    {
        $qty = $request->qty;
        if (Auth::guard('customer')->check()) {
            $updateCart = Cart::find($id);
            $updateCart->qty = $qty;
            $save = $updateCart->save();
            if ($save) {
                toast('Successfully updated cart', 'success');
            }else{
                toast('Cart not updated', 'error');
            }
            return redirect()->back();
        }else{
            $update = ShoppingCart::update($id, $qty);
            if ($update) {
                toast('Successfully updated cart', 'success');
            }else{
                toast('Cart not updated', 'error');
            }
            return redirect()->back();
        }
    }

    public function removeCart($id)
    {
    	
        if (!Auth::guard('customer')->check()) {
           $remove = ShoppingCart::remove($id);
            if ($remove) {
                toast('Product successfully removed from cart', 'success');
            }else{
                toast('Product not removed from cart', 'error');
            }
        }else{
            $cart = Cart::find($id);
            $remove = $cart->delete();
            if ($remove) {
                toast('Product successfully removed from cart', 'success');
            }else{
                toast('Product not removed from cart', 'error');
            }
        }

    	return redirect()->back();
    }

    
}
