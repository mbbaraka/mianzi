<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Mianzi\Product;
use Illuminate\View\View;
use ShoppingCart;

class AddToCart extends Component
{
	public $product;
	public $product_id;

    public function mount(Product $product): void
    {
        $this->product = $product;
    }


    public function addToCart(int $product_id): void
    {

    	$products = Product::find($product_id);
        
    	$attributes = ['cover' => $products->cover, 'slug' => $products->slug];

        if ($products->sale_price != "") {
            $price = $products->sale_price;
        }else{
            $price = $products->price;  
        }

        ShoppingCart::add($products->id, $products->title, 1, $price, $attributes);
        $this->emit('productAdded');
        
    }

    public function render(): View
    {
        return view('livewire.add-to-cart');
    }
}
