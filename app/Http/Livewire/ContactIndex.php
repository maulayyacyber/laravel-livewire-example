<?php

namespace App\Http\Livewire;

use App\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class ContactIndex extends Component
{

    use WithPagination;

    public $statusUpdate = false;

    protected $listeners = [
        'ContactStored'     => 'HandleStored',
        'ContactUpdated'    => 'HandleUpdated'
    ];

    public function HandleStored($contact)
    {
        session()->flash('notification', 'Data Berhasil Disimpan');
    }

    public function HandleUpdated($contact)
    {
        session()->flash('notification', 'Data Berhasil Diupdate');
    }

    public function getContact($id)
    {
        $this->statusUpdate = true;
        $contact = Contact::find($id);
        $this->emit('getContact', $contact);
    }

    public function destroy($id)
    {
        if($id) {
            $contact = Contact::find($id);
            $contact->delete();

            session()->flash('notification', 'Data Berhasil Dihapus');
        }
    }

    public function render()
    {
        return view('livewire.contact-index', [
            'contacts' => Contact::latest()->paginate(5)
        ]);
    }
}
