<?php

namespace App\Http\Livewire;

use App\Models\Mianzi\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\View\View;

class WishlistCount extends Component
{
	public $wishlistCount = 0;

	public $wishlist = 0;

	protected $listeners = [
        'wishlistAdded' => 'wishlistCount'
    ];

    public function mount(): void
    {
        $wishlist = Wishlist::where('customer_id', Auth::guard('customer')->id())->get();
        $this->wishlistCount = count($wishlist);
    }

    public function render(): View
    {
        return view('livewire.wishlist-count');
    }

    public function wishlistCount()
    {
    	$wishlist = Wishlist::where('customer_id', Auth::guard('customer')->id())->get();
    	$this->wishlistCount = count($wishlist);
    }
}
