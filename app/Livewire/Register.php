<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

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

        // save image
        $str = Str::random(15);
        $str = "$str.jpg";
        // $str = str_random(15);
        $data = Image::make($this->form['avatar'])->encode("jpg");
        Storage::disk('public')->put($str, $data);

        // save user
        User::create([
            "name" => $this->form['name'],
            "email" => $this->form['email'],
            "password" => $this->form['email'],
            "avatar" => $str
        ]);

        // redirect to login 
        return redirect(route('login'));
    }

    public function render()
    {
        return view('livewire.register');
    }

    public function emitEvent($evt) {
        $this->dispatch($evt);
    }
}
