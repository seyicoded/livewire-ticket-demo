<?php

namespace App\Livewire;

use App\Models\ticket;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Home extends Component
{
    public $ticketTitle = "";

    public function createTicket(){
        $this->validate([
            "ticketTitle" => "required|min:6"
        ]);

        $user = Auth::user();

        ticket::create([
            "name" => $this->ticketTitle,
            "user_id" => $user->id
        ]);
        
        // create ticket
        session()->flash("message", "Ticket created successfully");
        $this->dispatch('refreshTicket');
    }
    
    public function render()
    {
        return view('livewire.home');
    }
}
