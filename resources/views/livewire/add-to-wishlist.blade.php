<form wire:submit.prevent="addToWishlist({{ $product->id }})">
	<button class="add-to-wishlist" type="submit" title="Add to Wishlist" tabindex="0">
        <i class="ti-heart"></i>
    </button>
</form>