<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $loginError;
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

        if(Auth::attempt([
            'email' => $this->form['email'],
            'password' => $this->form['password'],
        ])){
            return redirect(route("dashboard"));
        }else{
            // return error 
            $this->loginError = "Incorrect email or password";
        }
    }

    public function render()
    {
        return view('livewire.login');
    }
}
