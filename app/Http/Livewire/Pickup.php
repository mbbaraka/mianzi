<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Mianzi\ShippingPrice;

class Pickup extends Component
{
	public $pickup;
	public $fee;
	public $idd;

	public function mount($pickup, $idd): void
    {
        $this->pickup = $pickup;
        $this->idd = $idd;
    }

    public function getPickup($id)
    {
        $this->fee = ShippingPrice::select('fee')->where('station_id', $id)->first();
    }

    public function render()
    {
        return view('livewire.pickup');
    }
}
