<div>
    <form wire:submit.prevent="addContact">
    	Email: <input wire:model="email" name="email">

    	<button type="submit" wire:click="addContact" wire:loading.attr="disabled">Submit</button>
    </form>
</div>