<?php

namespace App\Livewire\Components;

use App\Models\Contact;
use App\Notifications\TelegramNotification;
use Illuminate\Support\Facades\Notification;
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
        $text =
            "*Имя:* " . $this->name . "\n" .
            "*Email:* " . $this->email . "\n" .
            "*Телефон:* " . $this->phone . "\n" .
            "*Компания:* " . $this->company;
        Notification::route('telegram', '-4889722915')
            ->notify(new TelegramNotification($text));
        $this->isSent = true;
    }
}
