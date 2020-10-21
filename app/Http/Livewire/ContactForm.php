<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Mianzi\Subscription;

class ContactForm extends Component
{
    public $email;

    public function addContact()
    {
        Subscription::create(['email' => $this->email]);

        return redirect()->to('/hell');
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}