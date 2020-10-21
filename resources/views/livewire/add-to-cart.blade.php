<form wire:submit.prevent="addToCart({{ $product->id }})">
	<button class="add-to-cart" type="submit" title="Add to cart" tabindex="0">
        <i class="ti-bag"></i>
    </button>
</form>
