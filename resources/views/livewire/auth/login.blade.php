<div class='form-signin'>
    <form wire:submit='authenticate'>
        <div class="text-center mb-4">
            <h1 class="h3 fw-normal">Knowledge Management</h1>
        </div>

        <div class="form-floating mb-2">
            <input type="email" class="form-control" id="floatingInput" wire:model="email">
            <label for="floatingInput">Email</label>
        </div>
        <div class='text-danger'>
            @error('email')
                {{ $message }}
            @enderror
        </div>

        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPassword" wire:model="password">
            <label for="floatingPassword">Password</label>
        </div>
        <div class='text-danger'>
            @error('password')
                {{ $message }}
            @enderror
        </div>

        <button class="btn btn-lg btn-primary" type="submit" class="data-loading:opacity-50">

            <span wire:loading.remove wire:target="authenticate">
                Login
            </span>

            <span wire:loading wire:target="authenticate">
                <span class="spinner-border"></span>
            </span>

        </button>
    </form>
</div>
