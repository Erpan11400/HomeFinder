<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top p-3 border border-2">
  <div class="container-fluid">

    <a class="navbar-brand fw-bolder" href="/property">Home<span class="text-primary">Finder</span></a>

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
      <div>
        <a href="/login" class="btn btn-primary">Sign In</a>
        <a href="#" class="btn btn-light border border-primary">Get Started</a>
      </div>
    </div>
  </div>
</nav>