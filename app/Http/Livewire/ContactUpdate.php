<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;
use Livewire\WithFileUploads;

class ContactUpdate extends Component
{   
    public $name;
    public $phone;
    public $ContactId;

    protected $listeners = [
        'getContact'
    ];

    public function render()
    {
        return view('livewire.contact-update');
    }

    public function getContact($data){
        $this->name = $data['name'];
        $this->phone = $data['phone'];
        $this->ContactId = $data['id'];
    }

    public function update()
    {   
        $this->validate([
            'name' => 'required|min:4',
            'phone' => 'required|integer',
        ]);
        
        if($this->ContactId){
            $contact = Contact::find($this->ContactId);
            $contact->update([
                'name' => $this->name,
                'phone' => $this->phone,
            ]);

            $this->resetInput();
            $this->emit('contactUpdate', $contact);
        }
    }

    public function resetInput(){
        $this->name = null;
        $this->phone = null;
        $this->ContactId = null;
    }
}
