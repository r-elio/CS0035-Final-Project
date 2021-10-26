<div class="container px-5">
    <div class="d-sm-flex my-3 justify-content-center align-items-center">
        <h2 class="fw-bold mb-3 text-uppercase">{{ __('messages.transfer funds') }}</h2>
    </div>
    <div class="card bg-dark text-white" style="border-radius: 1rem;">
        <div class="card-body p-5">
            <form wire:submit.prevent="submit">
                <div class="mb-4 px-5">
                    <div class="input-group input-group-lg">
                        <span class="input-group-text">{{ __('messages.transferee account') }}</span>
                        <input wire:model="form.transferee" type="text" class="form-control">
                    </div>
                    @error('form.transferee')<p class="text-danger text-center mt-2">{{ $message }}</p>@enderror
                </div>
                <div class="mb-4 px-5">
                    <div class="input-group input-group-lg">
                        <span class="input-group-text">{{ __('messages.amount to transfer') }}</span>
                        <input wire:model="form.amount_transfer" type="number" min="1" class="form-control">
                    </div>
                    @error('form.amount_transfer')<p class="text-danger text-center mt-2">{{ $message }}</p>@enderror
                </div>
                <div class="d-flex justify-content-center mt-5">
                    <button class="btn btn-outline-light btn-lg me-4" type="submit">{{ __('messages.transfer') }}</button>
                    <a class="btn btn-outline-light btn-lg" role="button"
                       href="{{ route('user', app()->getLocale()) }}">{{ __('messages.back') }}</a>
                </div>
            </form>
        </div>
    </div>

    @if(session('invalid_transferee'))
        <script>
            $(document).ready(function () {
                $('#{{ session('invalid_transferee') }}').modal('show');
            });
        </script>

        <div class="modal fade" id="invalid_transferee" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content text-center">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('messages.invalid transferee') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="white-space: pre-line">{{ __('messages.invalid transferee content') }}</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(session('invalid_transferee_own'))
        <script>
            $(document).ready(function () {
                $('#{{ session('invalid_transferee_own') }}').modal('show');
            });
        </script>

        <div class="modal fade" id="invalid_transferee_own" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content text-center">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('messages.invalid transferee own') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="white-space: pre-line">{{ __('messages.invalid transferee own content') }}</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(session('invalid_amount'))
        <script>
            $(document).ready(function () {
                $('#{{ session('invalid_amount') }}').modal('show');
            });
        </script>

        <div class="modal fade" id="invalid_amount" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content text-center">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('messages.invalid amount transfer') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="white-space: pre-line">{{ __('messages.invalid amount transfer content') }}</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
