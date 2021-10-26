<div class="container">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card bg-dark text-white" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">
                    <div class="mb-md-3 mt-md-3">

                        <h2 class="fw-bold mb-5 text-uppercase">{{ __('messages.login') }}</h2>

                        <form wire:submit.prevent="submit">
                            <div class="form-outline form-white mb-4">
                                <input wire:model="form.account_id" type="text" id="account_id" class="form-control form-control-lg"/>
                                <label class="form-label" for="account_id">{{ __('messages.account number') }}</label>
                                @error('form.account_id')<p class="text-danger">{{ $message }}</p>@enderror
                            </div>

                            <div class="form-outline form-white mb-4">
                                <input wire:model="form.password" type="password" id="password" class="form-control form-control-lg"/>
                                <label class="form-label" for="password">{{ __('messages.pin') }}</label>
                                @error('form.password')<p class="text-danger">{{ $message }}</p>@enderror
                            </div>

                            <button class="btn btn-outline-light btn-lg px-5 mb-2" type="submit">{{ __('messages.login') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(session('invalid_login'))
        <script>
            $(document).ready(function () {
                $('#{{ session('invalid_login') }}').modal('show');
            });
        </script>

        <div class="modal fade" id="invalid_login" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content text-center">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('messages.invalid login') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="white-space: pre-line">{{ __('messages.invalid login content') }}</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
