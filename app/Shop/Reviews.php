<?php

namespace App\Shop;

use Illuminate\Support\Facades\Facade;
use App\Models\Mianzi\Review;
use Auth;

class Reviews extends Facade
{

    public static function average($id)
    {
        $avg = 0;
    	$review = Review::where('product_id', $id)->get();
        foreach ($review as $reviews) {            
            $avg +=$reviews->rating/count($review);
        }
    	return $avg;
    }

}
