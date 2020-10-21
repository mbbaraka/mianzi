<?php

namespace App\Models\Mianzi;

use Illuminate\Database\Eloquent\Model;
use App\Models\Mianzi\District;
use App\Models\Mianzi\Address;

class Region extends Model
{
    public function district()
    {
    	return $this->hasMany(District::class);
    }
    public function addresses()
    {
    	return $this->hasMany(Address::class);
    }
}
