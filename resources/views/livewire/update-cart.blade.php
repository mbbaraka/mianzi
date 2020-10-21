<div>
	<div class="input-number">
	     <input class="form-control input-number__input" wire:model="quantity" name="qty" type="number" min="1" value="{{$qty}}">
	     <div class="input-number__add" wire:click="updateCart({{$idd}})"></div>
	     <div class="input-number__sub" wire:click="updateCart({{$idd}})"></div>
	  </div>
</div>
