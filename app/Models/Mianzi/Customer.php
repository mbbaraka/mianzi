<?php

namespace App\Models\Mianzi;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Mianzi\Order;
use App\Models\Mianzi\Address;


class Customer  extends Authenticatable
{
    use Notifiable;

    protected $guard = 'customer';


    protected $fillable = [
        'first_name', 'last_name', 'email', 'password','email_verified_at'
    ];

    protected $hidden = ['password'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function address()
    {
        return $this->hasMany(Address::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * @param $term
     *
     * @return mixed
     */
    public function searchCustomer($term)
    {
        return self::search($term);
    }
    
    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function review()
    {
        return $this->hasMany('App\Models\Mianzi\Review');
    }

    public function cart()
    {
        return $this->hasMany('App\Models\Mianzi\Cart');
    }
} 