<div class="container px-5">
    <div class="d-sm-flex my-3 justify-content-center align-items-center">
        <h2 class="fw-bold mb-3 text-uppercase">{{ __('messages.cash withdrawal') }}</h2>
    </div>
    <div class="card bg-dark text-white" style="border-radius: 1rem;">
        <div class="card-body p-5">
            <div class="d-flex justify-content-center mt-5">
                <a class="btn btn-outline-light btn-lg" role="button"
                   href="{{ route('user', app()->getLocale()) }}">{{ __('messages.back') }}</a>
            </div>
        </div>
    </div>
</div>
