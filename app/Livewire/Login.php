<?php

namespace App\Livewire;

use Livewire\Component;

class Login extends Component
{
    public $form = [
        "email" => "",
        "password" => ""
    ];

    // protected $rules = [
    //     'form' => [
    //         "email" => "required|email",
    //         "password" => "required|completed",
    //     ]
    // ];

    public function updated($form){
        // $this->validate($this->form);
        $this->validateOnly($form, [
            "form.email" => "required|email",
            "form.password" => "required|min:6",
        ]);
    }

    public function processLogin() {
        $this->validate([
            "form.email" => "required",
            "form.password" => "required",
        ]);
    }

    public function render()
    {
        return view('livewire.login');
    }
}
