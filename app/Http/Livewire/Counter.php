<?php

namespace App\Http\Livewire; 

use Livewire\Component;
use App\Models\Mianzi\Subscription;

class Counter extends Component
{
	public $count = 0;

    public function increment()
    {
        $this->count++;
    }

    public function decrement()
    {
        $this->count--;
    }

    public function render()
    {
        return view('livewire.pickup');
    }
}
