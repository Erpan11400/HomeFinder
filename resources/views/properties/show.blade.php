@extends('template')

@section('content')

<main class="container py-5">

    <!-- Property Detail -->
    <div class="row g-4 align-items-start mb-5">

        <!-- Image -->
        <div class="col-lg-6">
            <img
                src="{{ $property->photo }}"
                class="img-fluid rounded-3 shadow-sm"
                alt="{{ $property->title }}">
        </div>

        <!-- Right Section -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">

                    <h2 class="text-primary fw-bold">
                        Rp. {{ number_format($property->price, 0, ',', '.') }}
                    </h2>

                    <p class="text-muted mb-2">
                        {{ $property->bed_room }} bed room & {{ $property->bath_room }} bath room
                    </p>

                    <p class="fw-semibold mb-4">
                        {{ $property->title }} <br>
                        <span class="text-muted fs-6">
                            {{ $property->city }}, {{ $property->country }}
                        </span>
                    </p>

                    <!-- Image Buttons Placeholder (optional) -->
                    <div class="row g-2 mb-4">
                        @foreach(['Tampak Depan', 'Tampak Belakang', 'Samping Kiri', 'Samping Kanan'] as $btn)
                        <div class="col-6">
                            <button class="btn btn-outline-secondary w-100">
                                {{ $btn }}
                            </button>
                        </div>
                        @endforeach
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary fw-semibold">
                            Purchase this Property
                        </button>
                        <button class="btn btn-light fw-semibold">
                            Request Info
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Summary -->
    <section class="mb-5">
        <h3 class="fw-semibold mb-3">Summary</h3>
        <p class="text-secondary lh-lg">
            {{ $property->summary }}
        </p>
    </section>

    <!-- Property Info -->
    <section class="row g-3">

        <div class="col-md-3 col-sm-6">
            <div class="card text-center h-100">
                <div class="card-body">
                    <p class="text-muted mb-1">Dimensi</p>
                    <h5 class="fw-semibold">
                        {{ $property->area_l }}m × {{ $property->area_w }}m
                    </h5>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card text-center h-100">
                <div class="card-body">
                    <p class="text-muted mb-1">Luas Total</p>
                    <h5 class="fw-semibold">
                        {{ $property->area_total }} m²
                    </h5>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card text-center h-100">
                <div class="card-body">
                    <p class="text-muted mb-1">Review</p>
                    <h5 class="fw-semibold">
                        {{ rand(40, 49) / 10 }} ⭐
                    </h5>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card text-center h-100">
                <div class="card-body">
                    <p class="text-muted mb-1">Kamar Tidur</p>
                    <h5 class="fw-semibold">{{ $property->bed_room }}</h5>
                </div>
            </div>
        </div>

    </section>

</main>

@endsection
