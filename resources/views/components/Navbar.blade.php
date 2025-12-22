<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top p-3 border-bottom">
    <div class="container-fluid">

        {{-- BRAND --}}
        <a class="navbar-brand fw-bolder" href="/">
            Home<span class="text-primary">Finder</span>
        </a>

        {{-- TOGGLER --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggle"
            aria-controls="navbarToggle" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse gap-3" id="navbarToggle">

            {{-- NAV LINKS --}}
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/properties') }}">
                        {{ __('nav.properties') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/services') }}">
                        {{ __('nav.services') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/about') }}">
                        {{ __('nav.about') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/contact') }}">
                        {{ __('nav.contact') }}
                    </a>
                </li>

                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('showFavorite') }}">
                            {{ __('nav.favorite') }}
                        </a>
                    </li>
                @endauth
            </ul>

            {{-- RIGHT SECTION --}}
            <div class="d-flex align-items-center gap-2">

                {{-- LANGUAGE SWITCH --}}
                <div class="btn-group me-2">
                    <a href="{{ route('lang.switch', 'en') }}"
                        class="btn btn-sm {{ app()->getLocale() === 'en' ? 'btn-primary' : 'btn-outline-primary' }}">
                        EN
                    </a>
                    <a href="{{ route('lang.switch', 'id') }}"
                        class="btn btn-sm {{ app()->getLocale() === 'id' ? 'btn-primary' : 'btn-outline-primary' }}">
                        ID
                    </a>
                </div>

                {{-- AUTH --}}
                @guest
                    <a href="{{ route('login') }}" class="btn btn-primary">
                        {{ __('nav.log_in') }}
                    </a>

                    <a href="{{ route('register') }}" class="btn btn-light border border-primary">
                        {{ __('nav.sign_in') }}
                    </a>
                @else
                    {{-- USER DROPDOWN --}}
                    <div class="dropdown">

                        <button class="btn btn-light border d-flex align-items-center gap-2" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">

                            {{-- USER AVATAR --}}
                            <div class="rounded-circle bg-primary text-white d-flex
                                align-items-center justify-content-center"
                                style="width:32px;height:32px;font-size:14px;">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>

                            {{-- USER NAME --}}
                            <span class="fw-semibold text-dark d-none d-md-inline">
                                {{ auth()->user()->name }}
                            </span>
                        </button>

                        {{-- DROPDOWN MENU --}}
                        <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
                            <li>
                                <a href="{{ route('history', auth()->user()->user_id) }}" class="dropdown-item">{{ __('nav.purchase_list')}}</a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="dropdown-item text-danger d-flex align-items-center gap-2">
                                        {{ __('nav.logout') }}
                                    </button>
                                </form>
                            </li>
                        </ul>

                    </div>
                @endguest

            </div>
        </div>
    </div>
</nav>
