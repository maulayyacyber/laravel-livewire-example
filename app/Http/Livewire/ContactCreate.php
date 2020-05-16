<?php

namespace App\Http\Livewire;

use App\Contact;
use Livewire\Component;

class ContactCreate extends Component
{

    public $name;
    public $phone;

    public function store()
    {
        $this->validate([
            'name'  => 'required',
            'phone' => 'required',
        ]);

        $contact = Contact::create([
            'name' => $this->name,
            'phone'=> $this->phone
        ]);
        $this->resetInput();

        $this->emit('ContactStored', $contact);

    }

    private function resetInput()
    {
        $this->name  = null;
        $this->phone = null; 
    }

    public function render()
    {
        return view('livewire.contact-create');
    }
}
