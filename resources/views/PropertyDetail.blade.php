@extends('template')

@section('content')
<div class="container py-5">
    <!-- Property Detail -->
    <div class="row g-4 align-items-start mb-5">

        <!-- Image -->
        <div class="col-lg-6">
            <img
                src="https://images.unsplash.com/photo-1570129477492-45c003edd2be?auto=format&fit=crop&w=1000&q=80"
                class="img-fluid rounded-3"
                alt="Property Image">
        </div>

        <!-- Right Section -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">

                    <h2 class="text-primary fw-bold">Rp. {{ number_format($prop->price, 0, ',', '.') }}</h2>
                    <p class="text-muted mb-2">{{ $prop->bed_room }} bed • {{ $prop->bath_room }} bath</p>

                    <p class="fw-semibold mb-4">
                        {{ $prop->owner_name }} <br>
                        <span class="text-muted fs-6">{{ $prop->city }}, {{ $prop->country }}</span>
                    </p>

                    <!-- Image Options -->
                    <div class="row g-2 mb-4">
                        <div class="col-6">
                            <button class="btn btn-outline-secondary w-100">
                                Tampilan samping
                            </button>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-outline-secondary w-100">
                                Tampilan belakang
                            </button>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-outline-secondary w-100">
                                Tampilan samping
                            </button>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-outline-secondary w-100">
                                Tampilan serong
                            </button>
                        </div>
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
            {{ $prop->summary }}
        </p>
    </section>

    <!-- Property Info -->
    <section class="row g-3">
        <div class="col-md-3 col-sm-6">
            <div class="card text-center h-100">
                <div class="card-body">
                    <p class="text-muted mb-1">Luas</p>
                    <h5 class="fw-semibold">{{ $prop->area_l }}m x {{ $prop->area_w }}m</h5>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card text-center h-100">
                <div class="card-body">
                    <p class="text-muted mb-1">Review</p>
                    <h5 class="fw-semibold">⭐ {{ $prop->review }}/10</h5>
                </div>
            </div>
        </div>

    </section>
</div>
@endsection