<?php

namespace App\Http\Livewire;

use App\Contact;
use Livewire\Component;

class ContactUpdate extends Component
{
    public $name;
    public $phone;
    public $contactId;

    protected $listeners = [
        'getContact' => 'ShowContact'
    ];

    public function ShowContact($contact)
    {
        $this->name      = $contact['name'];
        $this->phone     = $contact['phone'];
        $this->contactId = $contact['id']; 
    }

    public function update()
    {
        $this->validate([
            'name'  => 'required',
            'phone' => 'required',
        ]);

        if($this->contactId) {
            $contact = Contact::find($this->contactId);
            $contact->update([
                'name' => $this->name,
                'phone'=> $this->phone
            ]);

            $this->resetInput();

            $this->emit('ContactUpdated', $contact);

        }

    }

    private function resetInput()
    {
        $this->name  = null;
        $this->phone = null; 
    }

    public function render()
    {
        return view('livewire.contact-update');
    }
}
