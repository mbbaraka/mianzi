<?php

namespace App\Models\Mianzi;

use Illuminate\Database\Eloquent\Model;
use App\Models\Mianzi\AttributeValue;

class AttributeProduct extends Model
{
    protected $fillable = [
        'attribute_value_id',
        'product_id'
    ];

    protected $table = "attribute_product";
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function attributesValues()
    {
        return $this->belongsTo(AttributeValue::class, 'attribute_value_id');
    }
}
