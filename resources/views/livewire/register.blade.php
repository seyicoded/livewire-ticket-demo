<div class="w3-container w3-center w3-centered flex justify-center align-center">
    <form wire:submit='processRegister' style="width: 500px" class="w3-card-4 w3-round py-5 px-4 mx-5 my-5">
        <h3>Register Form</h3>

        <br />
        <div style="display: block;">

            @isset($form['avatar'])
                <img src="{{$form['avatar']}}" width="100" height="100" />
            @endisset
            <input id="avatar" wire:change="emitEvent('fileChoosen')" name="avatar" class="form-control" type="file" required/>
            <label for="name" class="w3-label">Choose Avatar</label>

            <div>
                @error('form.avatar')
                    avatar is required
                @enderror
            </div>
        </div>

        <br />
        <div style="display: block;">
            <input wire:model='form.name' name="name" class="form-control" type="text" placeholder="Enter name" required/>
            <label for="name" class="w3-label">Name</label>

            <div>
                @error('form.name')
                    name is required
                @enderror
            </div>
        </div>

        <br />
        <div style="display: block;">
            <input wire:model='form.email' name="email" class="form-control" type="email" placeholder="Enter Email Address" required/>
            <label for="email" class="w3-label">Email</label>

            <div>
                @error('form.email')
                    email is required
                @enderror
            </div>
        </div>


        <br />
        <div style="display: block;">
            <input wire:model='form.password' name="password" class="form-control" type="password" placeholder="Enter Password" required/>
            <label for="password" class="w3-label">Password</label>
            <div>
                @error('form.password')
                    password is required
                @enderror
            </div>
        </div>
        <br />

        <button type="submit" class="btn btn-block btn-secondary">Login</button>

    </form>

    <script>
        // window.livewire.on('fileChoosen', function ()=>{
        //     alert('reached');
        // });

        Livewire.on('fileChoosen', function (){
            try {
                
                const file = document.getElementById('avatar').files[0];
                // console.log(file);

                const reader = new FileReader();
                reader.onload = ()=>{
                    // Livewire.dispatch('fileBase64Ready', reader.result);
                    Livewire.dispatch('fileBase64Ready', [reader.result]);
                };
                reader.readAsDataURL(file);
            } catch (error) {
                alert(error?.message);
            }
        });
        
    </script>
</div>
