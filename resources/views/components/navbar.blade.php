<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top p-3 border border-2">
  <div class="container-fluid">

    <a class="navbar-brand fw-bolder" href="/">Home<span class="text-primary">Finder</span></a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggle" aria-controls="navbarToggle" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarToggle">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link active" href="{{ url('/properties') }}">Properties</a></li>
        <li class="nav-item"><a class="nav-link active" href="{{ url('/services') }}">Services</a></li>
        <li class="nav-item"><a class="nav-link active" href="{{ url('/about') }}">About</a></li>
        <li class="nav-item"><a class="nav-link active" href="{{ url('/contact') }}">Contact</a></li>
      </ul>

      
      <div class="d-flex gap-2 align-items-center">

        @guest
            {{-- not authenticated / guest --}}
            <a href="{{ route('login') }}" class="btn btn-primary">
                Sign In
            </a>
            <a href="{{ route('register') }}" class="btn btn-light border border-primary">
                Get Started
            </a>

        @else
            {{-- bagian dropdown pas udah login --}}
            <div class="dropdown">

            {{-- button --}}
            <button class="btn btn-light border d-flex align-items-center gap-2"
                    type="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false">

                {{-- profile user, dengan inisial nama --}}
                <div class="rounded-circle bg-primary text-white d-flex
                            align-items-center justify-content-center"
                     style="width:32px;height:32px;font-size:14px;">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>

                {{-- nama user --}}
                <span class="fw-semibold text-dark d-none d-md-inline">
                    {{ auth()->user()->name }}
                </span>
            </button>

            {{-- dropdown menu --}}
            <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
                {{-- logout --}}
                <li>
                    <a class="dropdown-item text-danger d-flex align-items-center gap-2"
                       href="#"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                </li>
            </ul>

            </div>

            <form id="logout-form"
                  action="{{ route('logout') }}"
                  method="POST"
                  class="d-none">
                @csrf
            </form>
        @endguest

      </div>
    </div>
  </div>
</nav>