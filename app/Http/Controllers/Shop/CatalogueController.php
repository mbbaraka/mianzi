<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mianzi\Category;
use App\Models\Mianzi\Product;
use App\Models\Mianzi\Attribute;
use App\Models\Mianzi\Subscription;
use Illuminate\Support\Facades\DB;
use Alert;

class CatalogueController extends Controller
{
    public function index(Request $request, $slug)
    {
    	$category = Category::where('slug', $slug)->first();
        $sort = $request->get('sort');
        if ($sort == "a-z") {
            $products = $category->product()->orderBy('title','asc')->latest()->paginate(24);
        }elseif($sort == "z-a"){
            $products = $category->product()->orderBy('title','desc')->latest()->paginate(24);
        }elseif($sort == "min-max"){
            $products = $category->product()->orderBy('sale_price','desc')->latest()->paginate(24);
        }else{
            $products = $category->product()->latest()->paginate(24);
        }
    	
        $all_products = $category->product()->get();
        $maxPrice = $category->product()->max('price');
    	$attributes = Attribute::latest()->get();
        $new = Product::latest()->paginate(3);
    	return view('home.catalogue.index', compact('maxPrice', 'products', 'category', 'attributes', 'new', 'all_products'));
    }

    public function allProducts(Request $request)
    {
    	$category = "All Products";
        $maxPrice = DB::table('products')->max('price');
        $sort = $request->get('sort');
        if ($sort == "a-z") {
            $products = Product::orderBy('title','asc')->latest()->paginate(24);
        }elseif($sort == "z-a"){
            $products = Product::orderBy('title','desc')->latest()->paginate(24);
        }elseif($sort == "min-max"){
            $products = Product::orderBy('sale_price','desc')->latest()->paginate(24);
        }else{
            $products = Product::latest()->paginate(24);
        }
        
    	$attributes = Attribute::latest()->get();
        $all_products = Product::latest()->get();
        $new = Product::latest()->paginate(3);
    	return view('home.catalogue.index', compact('maxPrice', 'products', 'category', 'attributes', 'new', 'all_products'));
    }

    public function subscribe(Request $request)
    {
        $this->validate($request,
            [
                'subscription_email' => 'required|email|unique:subscriptions',
            ],
            [
                'subscription_email.unique' => 'Email already subscribed',
            ]
        );
        $email = $request->subscription_email;
        $subscriber = new Subscription();
        $subscriber->subscription_email = $email;
        $save = $subscriber->save();
        if ($save) {
            toast('You have successfully subscribed to our newletter', 'success');
            return redirect()->back();
        }
    }
}
