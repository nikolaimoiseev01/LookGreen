<?php

namespace App\Livewire\Components;

use App\Models\Contact;
use Livewire\Component;

class ContactForm extends Component
{
    public $name;
    public $email;
    public $phone;
    public $company;
    public $isSent = false;

    public function render()
    {
        return view('livewire.components.contact-form');
    }

    public function submit()
    {
        Contact::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'company' => $this->company,
        ]);
        $this->isSent = true;
    }
}
