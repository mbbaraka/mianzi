<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mianzi\Product;

class AutoCompleteSearchController extends Controller
{
    public function autocomplete(Request $request)
    {
          $datas = Product::select("title")
        ->where("title","LIKE","%{$request->input('query')}%")
        ->get();
	    $dataModified = array();
	     foreach ($datas as $data)
	     {
	       $dataModified[] = $data->FirstName;
	     }

	    return response()->json($dataModified);
	           
	} 
}
