<?php

namespace App\Models\Mianzi; 

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category()
    {
    	return $this->belongsToMany('App\Models\Mianzi\Category', 'category_product')->withTimestamps();
    }

    public function productimages()
    {
    	return $this->HasMany('App\Models\Mianzi\Productimage');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attributes()
    {
        return $this->hasMany('App\Models\Mianzi\AttributeProduct');
    }
    public function order()
    {
        return $this->belongsToMany('App\Models\Mianzi\Order', 'order_products')->withTimestamps();
    }

    public function wishlists()
    {
        return $this->hasMany('App\Models\Mianzi\Wishlist');
    }

    public function review()
    {
        return $this->hasMany('App\Models\Mianzi\Review');
    }

    public function compare()
    {
        return $this->hasMany('App\Models\Mianzi\Compare');
    }

    public function cart()
    {
        return $this->hasMany('App\Models\Mianzi\Cart');
    }

    public function recentlyViewed()
    {
        return $this->hasMany('App\Models\Mianzi\RecentlyViewed');
    }
}
