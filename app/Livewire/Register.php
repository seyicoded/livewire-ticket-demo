<?php

namespace App\Livewire;

use Livewire\Component;

class Register extends Component
{

    public $form = [
        "name" => "",
        "email" => "",
        "password" => "",
        "avatar" => null
    ];

    protected $listeners = [
        'fileBase64Ready' => 'fileBase64Ready'
    ];

    public function fileBase64Ready($base64 = ""){
        // dd($base64);
        // dd($base64);
        $this->form['avatar'] = $base64;
    }

    public function updated($form){
        // $this->validate($this->form);
        $this->validateOnly($form, [
        "form.name" => "required",
        "form.email" => "required|email",
        "form.password" => "required|min:6",
        "form.avatar" => "required",
        ]);

        // dd($this->form);
    }

    public function processRegister() {
        $this->validate([
            "form.name" => "required",
            "form.email" => "required",
            "form.password" => "required",
            "form.avatar" => "required",
        ]);

        dd($this->form);
    }

    public function render()
    {
        return view('livewire.register');
    }

    public function emitEvent($evt) {
        $this->dispatch($evt);
    }
}
