<?php

namespace App\Shop;

use Illuminate\Support\Facades\Facade;
use App\Models\Mianzi\Category;

class Categories extends Facade
{
    public static function get()
    {
    	$category = Category::get();
    	return $category;
    }

    public static function getRoot()
    {
        $category = Category::where('root', '0')->orderBy('id', 'DESC')->get();
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

}
