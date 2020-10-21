<?php

namespace App\Models\Mianzi;

use Illuminate\Database\Eloquent\Model;
use App\Models\Mianzi\Region;
use App\Models\Mianzi\Customer;
use App\Models\Mianzi\District;

class Address extends Model
{
    
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function region()
    {
        return $this->belongsTo(Region::class,'region_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    // /**
    //  * @deprecated
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    //  */
    // public function city()
    // {
    //     return $this->belongsTo(City::class, 'city');
    // }

    // /**
    //  * @return \Illuminate\Database\Eloquent\Relations\HasMany
    //  */
    // public function orders()
    // {
    //     return $this->hasMany(Order::class);
    // }

}
