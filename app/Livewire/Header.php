<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Header extends Component
{

    function logout() {
        if(Auth::check()){
            Auth::logout();
        }

        return redirect(route("login"));
    }
    
    public function render()
    {
        return view('livewire.header');
    }
}
