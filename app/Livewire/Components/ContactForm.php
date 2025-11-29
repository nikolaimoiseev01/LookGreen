<?php

namespace App\Livewire\Components;

use Livewire\Component;

class ContactForm extends Component
{
    public $name;
    public $email;
    public $phone;
    public $company;

    public function render()
    {
        return view('livewire.components.contact-form');
    }

    public function submit() {

    }
}
