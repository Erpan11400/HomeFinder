@extends('layouts.Layout')

@section('navbar')
    @include('components.Navbar')
@endsection

@section('content')
    {{-- PAYMENT HERO --}}

    <section class="py-4 bg-light border-bottom">
        <div class="container h-100 text-center d-flex flex-column justify-content-center align-items-center">
            <h1 class="fw-bold display-6 mb-2">Payment</h1>
            <span class="text-muted">Complete your payment securely and easily</span>
        </div>
    </section>

    {{-- PAYMENT CONTENT --}}

    <section class="container py-5">
        <div class="row gap-4 d-flex justify-content-center">

            {{-- ``` --}}
            {{-- LEFT : PROPERTY SUMMARY --}}
            <div class="col-12 col-lg-5">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="ratio ratio-4x3 rounded-top overflow-hidden">
                        <img src="{{ $property->photo }}" class="w-100 h-100 object-fit-cover" alt="Property">
                    </div>

                    <div class="card-body">
                        <h5 class="fw-bold mb-1">{{ $property->city }}, {{ $property->country }}</h5>
                        <p class="text-muted small mb-3">
                            🛏 {{ number_format($property->bed_room, 0) }} Beds ·
                            🛁 {{ number_format($property->bath_room, 0) }} Baths ·
                            📐 {{ number_format($property->area_l * $property->area_w, 0, ',', '.') }} m²
                        </p>

                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-muted">Price</span>
                            <span class="fw-bold text-primary fs-5">
                                Rp {{ number_format($property->price, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- RIGHT : PAYMENT FORM --}}
            <div class="col-12 col-lg-6">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4">
                        <h4 class="fw-bold mb-4">Payment Details</h4>

                        <form action="{{ route('checkout', $property->property_id) }}" method="POST">
                            @csrf

                            <input type="hidden" name="property_id" value="{{ $property->property_id ?? '' }}">

                            {{-- CUSTOMER INFO --}}
                            <div class="mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" name="name" class="form-control form-control-lg"
                                    value="{{ auth()->user()->name }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control form-control-lg"
                                    value="{{ auth()->user()->email }}" required>
                            </div>

                            {{-- PAYMENT METHOD --}}
                            <div class="mb-4">
                                <label class="form-label">Payment Method</label>
                                <select name="payment_method" class="form-select form-select-lg" required>
                                    <option value="booking_fee">
                                        📝 Booking Fee
                                    </option>

                                    <option value="dp">
                                        💰 Down Payment (DP)
                                    </option>

                                    <option value="full_transfer">
                                        🏦 Bank Transfer 
                                    </option>

                                    <option value="kpr">
                                        🏠 KPR
                                    </option>
                                </select>
                                </select>
                            </div>

                            {{-- SUMMARY --}}
                            <div class="border rounded-4 p-3 mb-4 bg-light">
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-muted">Property Price</span>
                                    <span>Rp {{ number_format($property->price, 0, ',', '.') }}</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-muted">Admin Fee</span>
                                    <span>Rp 50.000</span>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between fw-bold">
                                    <span>Total</span>
                                    <span class="text-primary">
                                        Rp {{ number_format($property->price + 50000, 0, ',', '.') }}
                                    </span>
                                </div>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    💰 Pay Now
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
        {{-- ``` --}}

    </section>
@endsection
