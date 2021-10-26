<div class="container px-5">
    <div class="d-sm-flex my-3 justify-content-center align-items-center">
        <h2 class="fw-bold mb-3 text-uppercase">{{ __('messages.account settings') }}</h2>
    </div>
    <div class="card bg-dark text-white" style="border-radius: 1rem;">
        <div class="card-body p-5">
            <form wire:submit.prevent="submit">
                <div class="mb-4 px-5">
                    <div class="input-group input-group-lg">
                        <span class="input-group-text text-uppercase">{{ __('messages.old pin') }}</span>
                        <input wire:model="form.old_pin" type="password" class="form-control">
                    </div>
                    @error('form.old_pin')<p class="text-danger text-center mt-2">{{ $message }}</p>@enderror
                </div>
                <div class="mb-4 px-5">
                    <div class="input-group input-group-lg">
                        <span class="input-group-text text-uppercase">{{ __('messages.new pin') }}</span>
                        <input wire:model="form.new_pin" type="password" class="form-control">
                    </div>
                    @error('form.new_pin')<p class="text-danger text-center mt-2">{{ $message }}</p>@enderror
                </div>
                <div class="mb-4 px-5">
                    <div class="input-group input-group-lg">
                        <span class="input-group-text text-uppercase">{{ __('messages.confirm new pin') }}</span>
                        <input wire:model="form.new_pin_confirmation" type="password" class="form-control">
                    </div>
                    @error('form.new_pin_confirmation')<p class="text-danger text-center mt-2">{{ $message }}</p>@enderror
                </div>
                <div class="d-flex justify-content-center mt-5">
                    <button class="btn btn-outline-light btn-lg me-4" type="submit">{{ __('messages.change') }}</button>
                    <a class="btn btn-outline-light btn-lg" role="button"
                       href="{{ route('user', app()->getLocale()) }}">{{ __('messages.back') }}</a>
                </div>
            </form>
        </div>
    </div>
</div>
