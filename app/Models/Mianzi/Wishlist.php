<?php

namespace App\Models\Mianzi;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $table = "wishlists";

    protected $fillable = [
        'product_id', 'customer_id',
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Mianzi\Product');
    }
}
