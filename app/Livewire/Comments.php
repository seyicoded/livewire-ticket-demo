<?php

namespace App\Livewire;

use App\Models\ticket;
use Livewire\Component;
use App\Models\comments as CommentModel;

class Comments extends Component
{
    public $ticketId;
    public $comments;
    public $comment;

    public $listeners = [
        "ticketClicked"
    ];

    function ticketClicked($id) {
        $this->ticketId = $id;
        $this->comments = ticket::find($id)->comments();
    }

    public function createComment(){
        $this->validate([
            "comment" => "required|min:6"
        ]);

        CommentModel::create([
            "name" => $this->comment,
            "ticket_id" => $this->ticketId
        ]);

        session()->flash("message", "Comment created successfully");

        $this->ticketClicked($this->ticketId);
    }

    public function render()
    {
        return view('livewire.comments');
    }
}
