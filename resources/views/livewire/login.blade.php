<div class="w3-container w3-center w3-centered flex justify-center align-center">
    <form wire:submit.prevent='processLogin' style="width: 500px" class="w3-card-4 w3-round py-5 px-4 mx-5 my-5">
        <h3>Login Form</h3>

        <br />
        <div style="display: block;">
            <input wire:model='form.email' name="email" class="form-control" type="email" placeholder="Enter Email Address" required/>
            <label for="email" class="w3-label">Email</label>
            @error('form.email')
                Email is invalid
            @enderror
        </div>


        <br />
        <div style="display: block;">
            <input wire:model='form.password' name="password" class="form-control" type="password" placeholder="Enter Password" required/>
            <label for="password" class="w3-label">Password</label>
            @error('form.password')
                Password is required
            @enderror
        </div>
        <br />

        @error('form')
            validate information above
        @enderror

        @isset($loginError)
            <br />
            {{$loginError}}
            <br />
        @endisset


        <button type="submit" class="btn btn-block btn-secondary">Login</button>

    </form>
</div>