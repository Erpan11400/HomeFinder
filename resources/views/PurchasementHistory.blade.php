@extends('layouts.Layout')

@section('navbar')
@include('components.Navbar')
@endsection

@section('content')

{{-- HEADER SECTION --}}
{{-- HISTORY HERO --}}
<section class="py-4 bg-light border-bottom">
    <div class="container h-100 text-center d-flex flex-column justify-content-center align-items-center">
        <h1 class="fw-bold display-6 mb-2">{{ __('historyPurc.title_1')}}</h1>
        <span class="text-muted">{{ __('historyPurc.title_2')}}</span>
    </div>
</section>


{{-- PURCHASE HISTORY TABLE --}}
<section class="container py-5">
    <div class="row gap-4 d-flex justify-content-center">

        @forelse($purchases as $purchase)

        {{-- PURCHASE CARD --}}
        <div class="col-12 col-lg-10">
            <div class="card border shadow-sm rounded-4 overflow-hidden">

                <div class="row g-0">

                    {{-- LEFT : PROPERTY IMAGE --}}
                    <div class="col-md-4">
                        <div class="ratio ratio-4x3 h-100">
                            <img src="{{ $purchase->property->photo }}"
                                class="w-100 h-100 object-fit-cover"
                                alt="Property">
                        </div>
                    </div>

                    {{-- RIGHT : PURCHASE INFO --}}
                    <div class="col-md-8">
                        <div class="card-body p-4 h-100 d-flex flex-column justify-content-between">

                            {{-- Property Info --}}
                            <div>
                                <h5 class="fw-bold mb-1">
                                    {{ $purchase->property->city }},
                                    {{ $purchase->property->country }}
                                </h5>

                                <p class="text-muted small mb-3">
                                    🛏 {{ number_format($purchase->property->bed_room, 0) }} Beds ·
                                    🛁 {{ number_format($purchase->property->bath_room, 0) }} Baths ·
                                    📐 {{ number_format($purchase->area_l * $purchase->area_w, 0) }} m²
                                </p>

                                {{-- Payment Info --}}
                                <div class="row small mb-3">
                                    <div class="col-6 text-muted">{{ __('historyPurc.payment_method')}}</div>
                                    <div class="col-6 fw-semibold text-end">
                                        {{ ucfirst(str_replace('_', ' ', $purchase->payment_method)) }}
                                    </div>

                                    <div class="col-6 text-muted">{{ __('historyPurc.payment_date')}}</div>
                                    <div class="col-6 text-end">
                                        {{ $purchase->created_at->format('d M Y') }}
                                    </div>
                                </div>

                            </div>

                            {{-- Footer --}}
                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <span class="fw-bold text-primary fs-5">
                                    Rp {{ number_format($purchase->total, 0, ',', '.') }}
                                </span>

                                <span class="badge bg-success p-3">{{ __('historyPurc.paid')}}</span>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>

        @empty
        <div class="col-12 text-center text-muted py-5">
            You have no purchase history yet.
        </div>
        @endforelse

    </div>
</section>


@endsection