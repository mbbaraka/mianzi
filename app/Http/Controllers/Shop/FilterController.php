<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mianzi\Product;
use App\Models\Mianzi\Attribute;

class FilterController extends Controller
{
    public function singleSearch(Request $request)
    {
        $search_text = $request->get('query');
    	$category = "Search Results";
    	$attributes = Attribute::latest()->get();

        $sort = $request->get('sort');
        
        if ($sort == "a-z") {
            $products = Product::where('title', 'LIKE', '%'.$search_text.'%')->orderBy('title','asc')->paginate(24);
        }elseif($sort == "z-a"){
            $products = Product::where('title', 'LIKE', '%'.$search_text.'%')->orderBy('title','desc')->paginate(24);
        }elseif($sort == "min-max"){
            $products = Product::where('title', 'LIKE', '%'.$search_text.'%')->orderBy('price','asc')->paginate(24);
        }else{
            $products = Product::where('title', 'LIKE', '%'.$search_text.'%')->paginate(24);
        }

        $all_products = Product::where('title', 'LIKE', '%'.$search_text.'%')->get();
        $new = Product::latest()->paginate(3);
        $products->withPath('search?query='.$search_text);
    	return view('home.catalogue.search', compact('products', 'category', 'attributes', 'new', 'all_products', 'search_text'));
    }

    public function filterByAttribute()
    {
        $attributes = Attribute::latest()->get();
        $attr = $_GET[$attributes];
        $category = "Search Results";
        foreach ($attr as $attribute) {

            $products = Product::where('title', 'LIKE', '%'.$attribute->name.'%')->paginate(24);
            $all_products = Product::where('title', 'LIKE', '%'.$attribute->name.'%')->get();
            $new = Product::latest()->paginate(3);
            
        }
        return view('home.catalogue.search', compact('products', 'category', 'attributes', 'new', 'all_products', 'search_text'));
        // $search_text = $_GET['query'];
        
    }

    // public function sort()
    // {
    //     $category = "All Products";
    //     $search_text = $_GET['sort'];
    //     $attributes = Attribute::latest()->get();
    //     if ($search_text == "a-z") {
    //         $products = Product::orderBy('title', 'asc')->paginate(24);            
    //     }elseif($search_text == "z-a"){
    //         $products = Product::orderBy('title', 'desc')->paginate(24);
    //     }elseif($search_text == "min-max"){
    //         $products = Product::orderBy('price', 'desc')->paginate(24);
    //     }else{
    //        $products = Product::latest()->paginate(24);
    //     }
    //     $products->withPath('filter?sort='.$search_text);

    //     $all_products = Product::get();
    //     $new = Product::latest()->paginate(3);
    //     return view('home.catalogue.sort', compact('products', 'search_text', 'category', 'attributes', 'new', 'all_products'));
    // }
}
