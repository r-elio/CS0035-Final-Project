<div class="container px-5">
    <div class="d-sm-flex my-3 justify-content-center align-items-center">
        <h2 class="fw-bold mb-3 text-uppercase">{{ __('messages.balance inquiry') }}</h2>
    </div>
    <div class="card bg-dark text-white" style="border-radius: 1rem;">
        <div class="card-body p-5">
            <div class="mb-4 px-5 mx-auto col-7">
                <div class="input-group input-group-lg">
                    <span class="input-group-text">{{ __('messages.account number') }}</span>
                    <input type="text" readonly class="form-control" value="{{ auth()->user()->account_id }}">
                </div>
            </div>
            <div class="mb-4 px-5 mx-auto col-7">
                <div class="input-group input-group-lg">
                    <span class="input-group-text">{{ __('messages.account name') }}</span>
                    <input type="text" readonly class="form-control" value="{{ auth()->user()->name }}">
                </div>
            </div>
            <div class="mb-4 px-5 mx-auto col-7">
                <div class="input-group input-group-lg">
                    <span class="input-group-text">{{ __('messages.account balance') }}</span>
                    <input type="text" readonly class="form-control" value="{{ number_format(auth()->user()->balance,'2') }}">
                </div>
            </div>
            <div class="d-flex justify-content-center mt-5">
                <a class="btn btn-outline-light btn-lg" role="button"
                   href="{{ route('user', app()->getLocale()) }}">{{ __('messages.back') }}</a>
            </div>
        </div>
    </div>
</div>
