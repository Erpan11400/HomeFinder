@extends('template')

@section('content')
<!-- {{-- Hero Section --}} -->
<section class="text-center py-5 bg-light">
    <div class="container">
        <h1 class="fw-bold mb-4">The easiest way to find<br><span class="text-primary">your perfect property</span></h1>

        <div class="d-flex justify-content-center gap-2">
            <input type="text" class="form-control w-auto" placeholder="📍 Batam, Pekanbaru, etc.">
            <input type="text" class="form-control w-auto" placeholder="🏠 Rent / Buy">
            <button class="btn btn-primary">🔍</button>
        </div>
    </div>
</section>

<!--Categories  -->
<section class="container py-5 text-center">
    <div class="row g-3">
        @foreach (['Perumahan', 'Apartemen', 'Ruko', 'Gedung'] as $category)
        <div class="col-6 col-md-3">
            <div class="border rounded-3 py-4 bg-primary-subtle fw-semibold">
                {{ $category }}
            </div>
        </div>
        @endforeach
    </div>
</section>

<!-- { Recently Added }} -->
<section class="container py-5">
    <h2 class="fw-bold mb-4">Recently Added</h2>

    <div class="row g-4">
        @foreach($property as $prop)
        <div class="col-12 col-md-4">
            <a class="text-decoration-none" href="{{ route('property.show', $prop->property_id)}}">
                <div class="card shadow-sm border-1 h-100">
                    <div class="ratio ratio-4x3 bg-secondary-subtle rounded-top">
                        <img class="ratio ratio-4x3 bg-secondary-subtle rounded-top" src="{{ $prop->photo}}" alt="Rumah-{{ $prop->location }}">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $prop->city }}, {{ $prop->country }}</h5>
                        <p class="card-text text-muted">{{ $prop->bed_room }} Kamar • {{ $prop->luas_l * $prop->luas_w }} m²</p>
                        <div class="d-flex justify-content-between">
                            <span>👤 Agen</span>
                            <span class="fw-semibold text-primary">Rp.{{ number_format(($prop->price/1000000), 0, ',', '.') }} Juta</span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</section>
@endsection