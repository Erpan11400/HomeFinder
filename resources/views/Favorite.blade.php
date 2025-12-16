@extends('layouts.Layout')

@section('navbar')
    @include('components.Navbar')
@endsection
@section('content')
    {{-- FAVORITE HERO --}}

    <section class="py-4 bg-light border-bottom">
        <div class="container h-100 text-center d-flex flex-column justify-content-center align-items-center">
            <h1 class="fw-bold display-6 mb-2">
                {{ __('favorite.title') }}
            </h1>
            <span class="text-muted">
                {{ __('favorite.subtitle') }}
            </span>
        </div>
    </section>


    {{-- FAVORITE CONTENT --}}

    <section class="container py-5">
        <div class="row g-4">

            @forelse ($favorites as $favorite)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm rounded-4 h-100">
                        <div class="ratio ratio-4x3 rounded-top overflow-hidden">
                            <img src="{{ $favorite->photo }}" class="w-100 h-100 object-fit-cover" alt="Property">
                        </div>

                        <div class="card-body d-flex flex-column">
                            <h5 class="fw-bold mb-1">{{ $favorite->city }}, {{ $favorite->country }}</h5>
                            <p class="text-muted small mb-3">
                                🛏 {{ number_format($favorite->bed_room, 0) }} Beds ·
                                🛁 {{ number_format($favorite->bath_room, 0) }} Baths ·
                                📐 {{ number_format($favorite->area_l * $favorite->area_w, 0, ',', '.') }} m²
                            </p>

                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-muted">
                                    {{ __('favorite.price_label') }}
                                </span>
                                <span class="fw-bold text-primary">
                                    Rp {{ number_format($favorite->price / 1000000, 0, ',', '.') }} Juta
                                </span>
                            </div>


                            <div class="mt-auto d-flex gap-2">
                                <form action="{{ route('favorite.remove', $favorite->property_id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger flex-grow-1">
                                        {{ __('favorite.remove') }}
                                    </button>

                                </form>

                                <a href="{{ route('property.show', $favorite->property_id) }}"
                                    class="btn btn-primary flex-grow-1">
                                    {{ __('favorite.view') }}
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted fs-5">
                        {{ __('favorite.empty') }}
                    </p>
                </div>
            @endforelse

        </div>
    </section>
@endsection
