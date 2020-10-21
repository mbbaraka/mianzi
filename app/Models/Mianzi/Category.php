<?php

namespace App\Models\Mianzi;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function product()
    {
    	return $this->belongsToMany('App\Models\Mianzi\Product', 'category_product')->withTimestamps();
    }
}
