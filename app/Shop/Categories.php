<?php

namespace App\Shop;

use Illuminate\Support\Facades\Facade;
use App\Models\Mianzi\Category;
use App\Models\Mianzi\Product;


class Categories extends Facade
{
    public static function get()
    {
    	$category = Category::get();
    	return $category;
    }

    public static function getRoot()
    {
        $category = Category::where('root', '0')->inRandomOrder()->take(3)->get();
        return $category;
    }

    public static function subcategories($id)
    {
    	$category = Category::where('root', $id)->get();
    	return $category;
    }
    
    public static function sub_subcategories($id)
    {
        $category = Category::where('root', $id)->get();
        return $category;
    }

    public static function getProducts($id)
    {
        $category = Category::find($id)->first();
        $productCount = $category->product()->get();

        return $productCount;
    }

}
