<div style="display: flex; flex: 0.3; border-right: 1px solid rgba(0, 0, 0, 0.7);">
    {{-- Be like water. --}}
    <div style="display: block">
        <h3>My Tickets</h3>
    
        @foreach ($tickets as $ticket)
            <div wire:click="ticketClicked('{{$ticket->id}}')" class="card my-2" style="margin-right: 18px;">
                <div class="card-body">
                    <h5 class="card-title">{{$ticket->name}}</h5>
                </div>
            </div>
        @endforeach
    </div>
</div>
