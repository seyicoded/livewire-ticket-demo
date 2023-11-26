<div style="display: flex; flex: 0.7; margin-left: 20px">
    {{-- Be like water. --}}
    
    @isset($ticketId)    
        <div style="display: block;">
            <h3>Comments</h3>

            <div style="display: flex; justify-content: space-between">
                <input wire:model='comment' style="width: 750px; margin-right: 10px" class="form-control" placeholder="Write new comment" />
                <button wire:click='createComment' class="btn btn-secondary">Send</button>
            </div>
        
            <div>
                @foreach ($comments as $comment)
                <div class="card my-4" style="margin-right: 18px;">
                    <div class="card-body flex" style="justify-content: space-between">
                        <h5 class="card-title">{{$comment->name}}</h5>

                        <small>{{$comment->created_at->diffForHumans()}}</small>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    @endisset
</div>
