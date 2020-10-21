<?php

namespace App\Http\Livewire;

use Livewire\Component;
use ShoppingCart;
use Illuminate\View\View;


class CartQuantity extends Component
{
	public $countCart = 0;

	protected $listeners = [
        'productAdded' => 'updateCartTotal'
    ];
	public function mount(): void
    {
        $this->countCart = ShoppingCart::count();
    }
    public function render(): View
    {
        return view('livewire.cart-quantity');
    }
    public function updateCartTotal(): void
    {
        $this->countCart = ShoppingCart::count();
    }

}
