@extends('template')

@section('content')

{{-- HERO SECTION --}}
<section class="py-5 bg-light border-bottom">
    <div class="container text-center">

        <h1 class="fw-bold display-5 mb-3">
            The easiest way to find <br>
            <span class="text-primary">your perfect property</span>
        </h1>

        <p class="text-muted mb-4">Find homes, apartments, and commercial properties in seconds.</p>

        <div class="row justify-content-center g-2">
            <div class="col-12 col-md-3">
                <input type="text" class="form-control form-control-lg" placeholder="📍 City (Batam, Pekanbaru)">
            </div>
            <div class="col-12 col-md-3">
                <select class="form-select form-select-lg">
                    <option>🏠 Rent</option>
                    <option>💰 Buy</option>
                </select>
            </div>
            <div class="col-12 col-md-2 d-grid">
                <button class="btn btn-primary btn-lg">🔍 Search</button>
            </div>
        </div>

    </div>
</section>



{{-- CATEGORIES --}}
<section class="container py-5">
    <h2 class="fw-bold text-center mb-4">Browse Categories</h2>

    <div class="row g-4 text-center">
        @foreach (['Perumahan', 'Apartemen', 'Ruko', 'Gedung'] as $category)
        <div class="col-6 col-md-3">
            <div class="p-4 rounded-4 border bg-white shadow-sm hover-shadow transition"
                 style="cursor:pointer;">
                <div class="fs-4 fw-bold text-primary mb-2">
                    {{ $category }}
                </div>
                <small class="text-muted">Lihat semua properti</small>
            </div>
        </div>
        @endforeach
    </div>
</section>



{{-- RECENTLY ADDED --}}
<section class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Recently Added</h2>
        <a href="#" class="text-decoration-none fw-semibold">See all →</a>
    </div>

    <div class="row g-4">
        @foreach($property as $prop)
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
                        <h5 class="card-title fw-bold text-dark mb-1">{{ $prop->city }}, {{ $prop->country }}</h5>

                        <p class="text-muted small mb-2">
                            🛏 {{ $prop->bed_room }} Beds ·
                            🛁 {{ $prop->bath_room }} Baths ·
                            📐 {{ $prop->area_total }} m²
                        </p>

                        <div class="d-flex justify-content-between align-items-center pt-2">
                            <span class="small text-secondary">👤 Agent</span>
                            <span class="fw-bold text-primary">
                                Rp {{ number_format($prop->price, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>

                </div>
            </a>

        </div>
        @endforeach
    </div>

</section>

@endsection
