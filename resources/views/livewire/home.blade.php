
<div>
      <div class="w3-container py-4">

        <div>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
      
          <div style="justify-content: right" class="flex mx-5">
              <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-secondary">Create Ticket</button>
          </div>
          <div class="w3-card-4 flex w3-round py-5 px-5 mx-5 my-5">
              @livewire('tickets')
              @livewire('comments')
          </div>
      </div>
      
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Ticket</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                
                <div>
                    <input wire:model='ticketTitle' class="w3-input" placeholder="Enter Issue Ticket Title" required />
                </div>

                @error('ticketTitle')
                    {{$errors}}
                @enderror

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button data-bs-dismiss="modal" wire:click='createTicket' type="button" class="btn btn-primary">Create</button>
              </div>
            </div>
          </div>
        </div>

  </div>