<?php

namespace App\Http\Utilities\;

use App\Models\Mianzi\Product;
use App\Models\Mianzi\Category;


class Products
{
    public static function get($product = "", $count = "")
    {
    	//for latest products
    	if ($product == "latest") {
    		if ($count > 0) {
    			$products = Product::latest()->take($count)->get();
    			return $products;
    		}elseif($count == ''){
    			$products = Product::get();
    			return $products;
    		}
    	}

    	//for featured products
    	if ($product == "featured") {
    		if ($count > 0) {
    			$products = Product::where('featured', '1')->take($count)->get();
    			return $products;
    		}elseif($count == ''){
    			$products = Product::where('featured', '1')->get();
    			return $products;
    		}
    	}
    	
    	//for oldest products
    	if ($product == "oldest") {
    		if ($count > 0) {
    			$products = Product::orderBy('id', 'ASC')->take($count)->get();
    			return $products;
    		}elseif($count == ''){
    			$products = Product::orderBy('id', 'ASC')->get();
    			return $products;
    		}
    	}

    	//for random products
    	if ($product == "oldest") {
    		if ($count > 0) {
    			$products = Product::all()->random($count);
    			return $products;
    		}elseif($count == ''){
    			$products = Product::inRandomOrder()->get();
    			return $products;
    		}
    	}

    	//for best selling products
    	if ($product == "best-selling") {
    		if ($count > 0) {
    			$products = Product::orderBy('sold', 'DESC')->take($count)->get();
    			return $products;
    		}elseif($count == ''){
    			$products = Product::orderBy('sold', 'DESC')->get();
    			return $products;
    		}
    	}
    }


    //Product details
    public static function details($slug="", $id)
    {
    	$product = Product::where('id', $id)->where('slug', $slug)->first();
    	return $product;
    }
}
