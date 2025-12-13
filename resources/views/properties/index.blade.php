@extends('template')

@section('content')

<div class="container py-5">

    <h2 class="fw-bold mb-4">Cari Rumah Impianmu 🏡</h2>

    <div class="row g-4 mt-4">

        @foreach($properties as $property)
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">

            <div class="card shadow-sm border-0 h-100 property-card">

                <!-- GAMBAR -->
                <div class="card-img-top overflow-hidden rounded-top-3" style="height: 170px;">
                    <img 
                        src="{{ $property->photo }}" 
                        class="w-100 h-100 object-fit-cover"
                        alt="Property Image"
                    >
                </div>

                <!-- BODY -->
                <div class="card-body d-flex flex-column">

                    <h5 class="card-title fw-semibold text-truncate">
                        {{ $property->title }}
                    </h5>

                    <p class="text-muted mb-1 small">
                        {{ $property->city }}, {{ $property->country }}
                    </p>

                    <p class="fw-bold text-primary mb-3 fs-6">
                        Rp {{ number_format($property->price, 0, ',', '.') }}
                    </p>

                    <div class="mb-3">
                        <span class="badge bg-secondary me-1">
                            {{ $property->bed_room }} KT
                        </span>
                        <span class="badge bg-secondary me-1">
                            {{ $property->bath_room }} KM
                        </span>
                        <span class="badge bg-info">
                            {{ $property->area_total }} m²
                        </span>
                    </div>

                    <!-- BUTTON -->
                    <a href="{{ route('property.show', $property->id) }}" 
                        class="btn btn-primary mt-auto w-100">
                        Lihat Detail
                    </a>

                </div>
            </div>

        </div>
        @endforeach

    </div>

</div>

@endsection
