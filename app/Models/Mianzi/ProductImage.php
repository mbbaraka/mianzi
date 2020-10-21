<?php

namespace App\Models\Mianzi;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    public function product()
    {
    	return $this->belogsTo('App\Models\Mianzi\Product');
    }
}
