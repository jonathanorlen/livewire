<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class ContactIndex extends Component
{   
    use WithPagination;

    public $statusUpdate = false;
    public $paginate = 5;
    public $search;
    public $form = false;

    protected $listeners = [
        'contactStored',
        'contactUpdate',
    ];

    protected $queryString  = ['search'];

    public function mount(){
        $this->search = request()->query('search', $this->search);
    }

    public function render()
    {   
        
        return view('livewire.contact-index', [
            'data' => $this->search === null ? 
                Contact::latest()->paginate($this->paginate) :
                Contact::latest()->where('name','like','%'.$this->search.'%')->paginate($this->paginate)
        ]);
    }

    public function destroy($id){
        if($id){
            $data = Contact::find($id);
            $data->delete();
            session()->flash('message-delete','Contact '.$data['name'].' was delete');
        }
    }

    public function getContact($id){
        $this->statusUpdate = true;
        $contact = Contact::find($id);
        $this->emit('getContact', $contact);
    }

    public function contactStored($data){
        session()->flash('message','Contact '.$data['name'].' was stored');
    }

    public function contactUpdate($data){
        session()->flash('message','Contact '.$data['name'].' was update');
    }
}
