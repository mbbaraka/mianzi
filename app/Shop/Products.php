<?php

namespace App\Shop;

use Illuminate\Support\Facades\Facade;
use App\Models\Mianzi\Product;
use App\Models\Mianzi\Category;
use App\Models\Mianzi\AttributeProduct;
use App\Models\Mianzi\RecentlyViewed;



class Products extends Facade
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
    	if ($product == "random") {
    		if ($count > 0) {
    			$products = Product::all()->random($count);
    			return $products;
    		}elseif($count == ''){
    			$products = Product::inRandomOrder()->get();
    			return $products;
    		}
    	}

    	if ($product == "best-selling") {
    		if ($count > 1) {
    			$products = Product::orderBy('sold', 'DESC')->take($count)->get();
    			return $products;
    		}elseif($count == ''){
    			$products = Product::orderBy('sold', 'DESC')->get();
    			return $products;
    		}elseif ($count == '1') {
                $products = Product::orderBy('sold', 'ASC')->first();
                return $products;
            }
    	} 
    }


    //Product related
    public static function related($id)
    {
     //    $related = "";
    	// $products = Product::where('id', $id)->first();
     //    $category = $products->category()->get();
     //    // $allProducts = Product::get();
        
    	// return $category;
        $productId = Product::find($id)->category->pluck('id');
        $related = Product::whereHas('category.product', function($query) use($productId) {
            $query->whereIn('category_id', $productId);
        })
        ->take(10)->get()->except($id);
        return $related;

    }

     //Product recently viewed
    public static function recent($customer, $product)
    {
        $except = RecentlyViewed::where('product_id', $product)->where('customer_id', $customer)->first();
        $products = RecentlyViewed::where('customer_id', $customer)->take(5)->get()->except($except->id);
        return $products;
    }

    //Product Attribute
    public static function attributes($id)
    {
        $attribute = AttributeProduct::where('product_id', $id)->get();        
        return $attribute;
    }
}
