<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top p-3 border-bottom">
    <div class="container-fluid">

        <a href="/" class="fs-5 ms-3 fw-bolder text-decoration-none text-dark">Home<span
                class="text-primary">Finder</span></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggle"
            aria-controls="navbarToggle" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse gap-2" id="navbarToggle">
            <div class="d-flex gap-2 align-items-center ms-auto">
                {{-- bagian dropdown pas udah login --}}
                <div class="dropdown">

                    {{-- button --}}
                    <button class="btn btn-light border d-flex align-items-center gap-2" type="button"
                        data-bs-toggle="dropdown" aria-expanded="false">

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
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="dropdown-item text-danger d-flex align-items-center gap-2">Logout</button>
                            </form>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</nav>