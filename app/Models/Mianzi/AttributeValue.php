<?php

namespace App\Models\Mianzi;

use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
     protected $fillable = [
        'value',
        'attribute_id'
    ]; 

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function productAttributes()
    {
        return $this->hasMany(AttributeProduct::class);
    }
}
