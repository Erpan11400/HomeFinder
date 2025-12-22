@extends('layouts.Layout')

@section('navbar')
    @include('components.Navbar')
@endsection

@section('content')

{{-- HERO SECTION --}}
<section class="py-5 bg-light border-bottom">
    <div class="container text-center">

        <h1 class="fw-bold display-5 mb-3">
            {{ __('home.hero_title_1') }} <br>
            <span class="text-primary">{{ __('home.hero_title_2') }}</span>
        </h1>

        <p class="text-muted mb-5">
            {{ __('home.hero_subtitle') }}
        </p>

        <div class="row justify-content-center mt-5 text-muted">
            <div class="col-md-3">✔ {{ __('home.feature_verified') }}</div>
            <div class="col-md-3">✔ {{ __('home.feature_secure') }}</div>
            <div class="col-md-3">✔ {{ __('home.feature_support') }}</div>
        </div>

    </div>
</section>

{{-- CATEGORIES --}}
<section class="container py-5">
    <h2 class="fw-bold text-center mb-4">
        {{ __('home.browse_categories') }}
    </h2>

    <div class="row g-4 text-center">
        @foreach ([
            __('home.category_housing'),
            __('home.category_apartment'),
            __('home.category_shop_house'),
            __('home.category_building')
        ] as $category)
            <div class="col-6 col-md-3">
                <div class="p-4 rounded-4 border bg-white shadow-sm hover-shadow transition"
                     style="cursor:pointer;">
                    <div class="fs-4 fw-bold text-primary mb-2">
                        {{ $category }}
                    </div>
                    <small class="text-muted">
                        {{ __('home.category_hint') }}
                    </small>
                </div>
            </div>
        @endforeach
    </div>
</section>

{{-- RECENTLY ADDED --}}
<section class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">
            {{ __('home.recently_added') }}
        </h2>

        <a href="{{ route('properties.list') }}"
           class="text-decoration-none fw-semibold">
            {{ __('home.see_all') }} →
        </a>
    </div>

    <div class="row g-4">
        @foreach ($property as $prop)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">

                <a href="{{ route('property.show', $prop) }}" class="text-decoration-none">
                    <div class="card border-0 shadow-sm h-100 rounded-4 overflow-hidden">

                        {{-- Photo --}}
                        <div class="ratio ratio-4x3">
                            <img src="{{ $prop->photo }}"
                                 class="w-100 h-100 object-fit-cover"
                                 alt="Property {{ $prop->city }}">
                        </div>

                        {{-- Card Body --}}
                        <div class="card-body">
                            <h5 class="card-title fw-bold text-dark mb-1">
                                {{ $prop->city }}, {{ $prop->country }}
                            </h5>

                            <p class="text-muted small mb-2">
                                🛏 {{ number_format($prop->bed_room) }} Beds ·
                                🛁 {{ number_format($prop->bath_room) }} Baths ·
                                📐 {{ number_format($prop->area_l * $prop->area_w, 0, ',', '.') }} m²
                            </p>

                            <div class="d-flex justify-content-between align-items-center pt-2">
                                <span class="small text-secondary">👤 Agent</span>
                                <span class="fw-bold text-primary">
                                    Rp {{ number_format($prop->price / 1000000, 0, ',', '.') }} Juta
                                </span>
                            </div>
                        </div>

                    </div>
                </a>

            </div>
        @endforeach
    </div>
</section>

<div aria-live="polite" aria-atomic="true" class="position-relative">
  <div class="toast-container position-fixed top-0 end-0 p-3">
    <div id="myToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <strong class="me-auto">Notifikasi</strong>
        <small>Baru</small>
        <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
      </div>
      <div class="toast-body">
        {{ session('success')}}
      </div>
    </div>
  </div>
</div>

@if(session('success'))
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const toastEl = document.getElementById('myToast')

    const toast = new bootstrap.Toast(toastEl, {
      delay: 2000,
      autohide: true
    })

    toast.show()
  })
</script>
@endif

@endsection
