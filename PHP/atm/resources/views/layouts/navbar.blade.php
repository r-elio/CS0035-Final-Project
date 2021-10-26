<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="
        @if(auth()->check())
            @if(auth()->user()->is_admin)
                {{ route('admin', app()->getLocale()) }}
            @else
                {{ route('user', app()->getLocale()) }}
            @endif
        @else
            {{ route('login', app()->getLocale()) }}
        @endif">
            <img src="{{ asset('favicon/atm_logo.png') }}" alt="" width="30" height="30">
            ATM System
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                @guest
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            {{ __('messages.about') }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="" data-bs-toggle="modal"
                                   data-bs-target="#about_atm">{{ __('messages.about atm') }}</a></li>
                            <li><a class="dropdown-item" href="" data-bs-toggle="modal"
                                   data-bs-target="#about_us">{{ __('messages.about us') }}</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            {{ __('messages.language') }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item @if(App::isLocale('en')) disabled @endif"
                                   href="{{ route(Route::currentRouteName(), 'en') }}">{{ __('messages.english') }}</a>
                            </li>
                            <li><a class="dropdown-item @if(App::isLocale('fil')) disabled @endif"
                                   href="{{ route(Route::currentRouteName(), 'fil') }}">{{ __('messages.tagalog') }}</a>
                            </li>
                        </ul>
                    </li>
                @endguest
                @auth
                    @if(auth()->user()->is_admin)
                        <li class="nav-item dropdown">
                            <button class="btn btn-dark" type="button" data-bs-toggle="modal"
                                    data-bs-target="#logout_modal">{{ __('messages.logout') }}</button>
                        </li>
                    @endif
                @endauth
            </ul>
        </div>
    </div>
</nav>

@guest
    <!-- About Modal -->
    <div class="modal fade" id="about_atm" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('messages.about atm') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" style="white-space: pre-line">{{ __('messages.about atm content') }}</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="about_us" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('messages.about us') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" style="white-space: pre-line">{{ __('messages.about us content') }}</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
@endguest

@auth
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
@endauth
