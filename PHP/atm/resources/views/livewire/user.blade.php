<div class="container px-5">
    <div class="d-sm-flex my-3 justify-content-center align-items-center">
        <h2 class="fw-bold mb-3 text-uppercase">{{ __('messages.services title') }}</h2>
    </div>
    <div class="card bg-dark text-white" style="border-radius: 1rem;">
        <div class="card-body p-5">
            <div class="row g-5">
                <div class="col-md-6">
                    <a class="btn btn-outline-light btn-lg" style="width: 100%" role="button"
                       data-bs-toggle="tooltip" data-bs-placement="right" title="{{ __('messages.tooltip withdraw') }}"
                       href="{{ route('cash-withdrawal', app()->getLocale()) }}">{{ __('messages.cash withdrawal') }}</a>
                </div>
                <div class="col-md-6">
                    <a class="btn btn-outline-light btn-lg" style="width: 100%" role="button"
                       data-bs-toggle="tooltip" data-bs-placement="right" title="{{ __('messages.tooltip deposit') }}"
                       href="{{ route('cash-deposit', app()->getLocale()) }}">{{ __('messages.cash deposit') }}</a>
                </div>
                <div class="col-md-6">
                    <a class="btn btn-outline-light btn-lg" style="width: 100%" role="button"
                       data-bs-toggle="tooltip" data-bs-placement="right" title="{{ __('messages.tooltip transfer') }}"
                       href="{{ route('transfer-funds', app()->getLocale()) }}">{{ __('messages.transfer funds') }}</a>
                </div>
                <div class="col-md-6">
                    <a class="btn btn-outline-light btn-lg" style="width: 100%" role="button"
                       data-bs-toggle="tooltip" data-bs-placement="right" title="{{ __('messages.tooltip balance') }}"
                       href="{{ route('balance-inquiry', app()->getLocale()) }}">{{ __('messages.balance inquiry') }}</a>
                </div>
                <div class="col-md-6">
                    <a class="btn btn-outline-light btn-lg" style="width: 100%" role="button"
                       data-bs-toggle="tooltip" data-bs-placement="right" title="{{ __('messages.tooltip settings') }}"
                       href="{{ route('account-settings', app()->getLocale()) }}">{{ __('messages.account settings') }}</a>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-outline-light btn-lg" type="button" data-bs-toggle="modal"
                            data-bs-toggle="tooltip" data-bs-placement="right" title="{{ __('messages.tooltip logout') }}"
                            data-bs-target="#logout_modal" style="width: 100%">{{ __('messages.logout') }}</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Logout Modal -->
    <div class="modal fade" id="logout_modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('messages.logout') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    {{ __('messages.logout content') }}
                </div>
                <div class="modal-footer justify-content-center">
                    <form action="{{ route('logout', app()->getLocale()) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary">Yes</button>
                    </form>
                    <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">No
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
