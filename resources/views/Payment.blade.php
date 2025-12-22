@extends('layouts.Layout')

@section('navbar')
    @include('components.Navbar')
@endsection

@section('content')
    {{-- PAYMENT HERO --}}

    <section class="py-4 bg-light border-bottom">
        <div class="container h-100 text-center d-flex flex-column justify-content-center align-items-center">
            <h1 class="fw-bold display-6 mb-2">{{ __('payment.page_title_1') }}</h1>
            <span class="text-muted">{{ __('payment.page_title_2') }}</span>
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
                        <h4 class="fw-bold mb-4">{{ __('payment.payment_details') }}</h4>

                        <form action="{{ route('checkout') }}" method="POST">
                            @csrf

                            <input type="hidden" name="property_id" value="{{ $property->property_id }}">

                            {{-- CUSTOMER INFO --}}
                            <div class="mb-3">
                                <label class="form-label">{{ __('payment.full_name') }}</label>
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
                                <label class="form-label">{{ __('payment.payment_method') }}</label>
                                <select name="payment_method" class="form-select form-select-lg" required>
                                    <option selected value="cash">
                                        💸 Cash
                                    </option>

                                    <option value="transfer_bank">
                                        🏦 Bank Transfer 
                                    </option>

                                    <option value="qris">
                                        📱 Qris
                                    </option>
                                </select>
                                </select>
                            </div>

                            {{-- SUMMARY --}}
                            <div class="border rounded-4 p-3 mb-4 bg-light">
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-muted">{{ __('payment.property_price') }}</span>
                                    <span>Rp {{ number_format($property->price, 0, ',', '.') }}</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-muted">{{ __('payment.admin_fee') }}</span>
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
                                    💰 {{ __('payment.pay_now') }}
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
        {{-- ``` --}}

        <!-- Modal -->
        <div class="modal fade" id="successNotif" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="purchaseSuccessLabel" aria-hidden="true">

            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 rounded-4 shadow">

                    <div class="modal-body text-center p-5">

                        {{-- Icon --}}
                        <div class="mb-3">
                            <div class="rounded-circle bg-success bg-opacity-10 d-inline-flex align-items-center justify-content-center"
                                style="width: 80px; height: 80px;">
                                <div class="rounded-circle bg-success d-inline-flex align-items-center justify-content-center"
                                    style="width: 50px; height: 50px;">

                                    <!-- Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 640 640"
                                        width="28"
                                        height="28"
                                        fill="currentColor"
                                        class="text-white">
                                        <path d="M530.8 134.1C545.1 144.5 548.3 164.5 537.9 178.8L281.9 530.8C276.4 538.4 267.9 543.1 258.5 543.9C249.1 544.7 240 541.2 233.4 534.6L105.4 406.6C92.9 394.1 92.9 373.8 105.4 361.3C117.9 348.8 138.2 348.8 150.7 361.3L252.2 462.8L486.2 141.1C496.6 126.8 516.6 123.6 530.9 134z"/>
                                    </svg>

                                </div>
                            </div>
                        </div>

                        {{-- Title --}}
                        <h5 class="fw-bold mb-2">
                            {{ __('modal.title') }} 🎉
                        </h5>

                        {{-- Message --}}
                        <p class="text-muted mb-4">
                            {{ __('modal.message') }}
                        </p>

                        {{-- Action --}}
                        <div class="d-grid gap-2">
                            <a href="{{ route('dashboard') }}" class="btn btn-primary">
                                {{ __('modal.btn_1') }}
                            </a>
                            <a href="{{ route('history', auth()->user()->user_id) }}" class="btn btn-outline-secondary">
                                {{ __('modal.btn_2') }}
                            </a>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </section>
    
    @if(session('openModal'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let modal = new bootstrap.Modal(document.getElementById('successNotif'))
            modal.show()
        })
    </script>
    @endif

    </section>
@endsection
