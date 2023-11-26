<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Tickets extends Component
{
    public $user;
    public $tickets;

    public $listeners = [
        "refreshTicket"
    ];

    public function refreshTicket() {
        $this->tickets = $this->user->tickets();
    }

    function mount() {
        $this->user = Auth::user();
        $this->tickets = $this->user->tickets();
    }

    public function ticketClicked($id) {
        $this->dispatch('ticketClicked', $id);
    }
    public function render()
    {
        return view('livewire.tickets', [
            // "tickets" => $this->user->tickets()
        ]);
    }
}
