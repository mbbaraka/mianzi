<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Mianzi\Product;
use App\Models\Mianzi\Wishlist;
use Illuminate\View\View;
use Alert;

class AddToWishlist extends Component
{
	public $product;

    public function mount(Product $product): void
    {
        $this->product = $product;
    }

    

    public function addToWishlist(int $product_id): void
    {
    	
        Wishlist::create([
            'product_id' => $product_id,
            'customer_id' => Auth::guard('customer')->id(),
        ]);
         $this->emit('wishlistAdded');

        // $this->emit('wishlistAdded');

        //ShoppingCart::add(37, 'Item name', 1, 100.00, ['color' => 'red', 'size' => 'M']);
        // ShoppingCart::destroy();
    }

    public function render(): View
    {
        // toast('Product already in wishlist', 'warning');
        return view('livewire.add-to-wishlist');
    }
}
