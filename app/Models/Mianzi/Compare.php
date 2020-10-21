<?php

namespace App\Models\Mianzi;

use Illuminate\Database\Eloquent\Model;

class Compare extends Model
{
    public function product()
    {
    	return $this->belongsTo('App\Models\Mianzi\Product');
    }

    public function customer()
    {
    	return $this->belongsTo('App\Models\Mianzi\Customer');
    }
}
