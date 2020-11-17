<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithFileUploads;
use Str;
class ContactCreate extends Component
{   
    use WithFileUploads;   
    public $name, $phone, $avatar;

    // public function mount($data){
    //     $this->data = $data;
    // }

    public function render()
    {
        return view('livewire.contact-create');
    }

    public function updated($field){
        $this->validateOnly($field, [
            'name' => 'required|min:4',
            'phone' => 'required|integer',
        ]);
    }

    public function store()
    {   
        $this->validate([
            'name' => 'required|min:4',
            'phone' => 'required|integer',
            'avatar' => 'required|image|max:5090'
        ]);
        
        $name = Str::random(10).'.'.$this->avatar->extension();
        $this->avatar->storeAs('avatar', $name);

        $contact = Contact::create([
            'name' => $this->name,
            'avatar' => $name,
            'phone' => $this->phone,
        ]);

        $this->resetInput();
        $this->emit('contactStored', $contact);
        $this->emit('formToggle');
    }

    private function upload_image($image,$old_image = null){
        $path = public_path().'\images';
        $path_old_image = $path.$old_image;
        if($old_image && file_exists($path_old_image) && ($old_image != 'default.jpg')){
            unlink($path_old_image);
        }
        $image_name = Str::random(10).'.'.$image->getClientOriginalExtension();
        $image->move($path, $image_name);
        return $image_name;
    }

    private function resetInput(){
        $this->name = null;
        $this->phone = null;
    }
}
