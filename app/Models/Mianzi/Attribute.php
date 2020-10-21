<?php

namespace App\Models\Mianzi;

use Illuminate\Database\Eloquent\Model;
use App\Models\Mianzi\AttributeValue;
use App\Models\Mianzi\AttributeProduct;

class Attribute extends Model
{
     protected $fillable = [
        'name' 
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function values()
    {
        return $this->hasMany(AttributeValue::class);
    }
    public function products()
    {
        return $this->hasMany(AttributeProduct::class);
    }
}
