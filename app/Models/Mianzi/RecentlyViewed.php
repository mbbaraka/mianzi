<?php

namespace App\Models\Mianzi;

use Illuminate\Database\Eloquent\Model;

class RecentlyViewed extends Model
{
    public function product()
    {
        return $this->belongsTo('App\Models\Mianzi\Product');
    }
}
