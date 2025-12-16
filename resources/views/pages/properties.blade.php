@extends('layouts.Layout')

@section('navbar')
    @include('components.Navbar')
@endsection

@section('content')
    <div class="container py-5">

        {{-- PAGE HEADER --}}
        <div class="text-primary mb-5 text-center">
            <h1 class="fw-bold">
                {{ __('properties.title') }}
            </h1>
            <p class="text-muted fs-5">
                {{ __('properties.subtitle') }}
            </p>
        </div>

        {{-- Search bar --}}
        <form method="GET" action="{{ route('properties.list') }}" class="mb-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="input-group shadow-sm rounded-4 overflow-hidden">
                        <input type="text" name="search" value="{{ request('search') }}"
                            class="form-control border-0 px-4 py-3" placeholder="{{ __('properties.search_placeholder') }}">

                        <button class="btn btn-primary px-4">
                            {{ __('properties.search_button') }}
                        </button>
                    </div>
                </div>
            </div>
        </form>

        {{-- EMPTY STATE --}}
        @if ($properties->isEmpty())
            <div class="text-center py-5">
                <h5 class="text-muted">
                    {{ __('properties.empty') }}
                </h5>
            </div>
        @else
            {{-- PROPERTIES GRID --}}
            <div class="row g-4">
                @foreach ($properties as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100 border-0 shadow-sm rounded-4">

                            {{-- IMAGE --}}
                            <img src="{{ $item->photo ?? 'https://via.placeholder.com/400x250' }}"
                                class="card-img-top rounded-top-4" style="height: 220px; object-fit: cover;"
                                alt="Property Image">

                            {{-- CARD BODY --}}
                            <div class="card-body">

                                {{-- PRICE --}}
                                <h5 class="text-primary fw-bold mb-1">
                                    Rp {{ number_format($item->price) }}
                                </h5>

                                {{-- LOCATION --}}
                                <p class="text-muted mb-2">
                                    {{ $item->city }}, {{ $item->state }}
                                </p>

                                {{-- PROPERTY INFO --}}
                                <div class="d-flex gap-3 text-muted small mb-3">
                                    <span>🛏 {{ number_format($item->bed_room) }} {{ __('properties.beds') }}</span>
                                    <span>🛁 {{ number_format($item->bath_room) }} {{ __('properties.baths') }}</span>
                                    <span>📐 {{ number_format($item->area_l, 0, ',', '.') }}
                                        {{ __('properties.area') }}</span>
                                </div>

                                {{-- SUMMARY --}}
                                <p class="text-muted small">
                                    {{ Str::limit($item->summary, 80) }}
                                </p>

                            </div>

                            {{-- CARD FOOTER --}}
                            <div class="card-footer bg-white border-0">
                                <a href="{{ route('property.show', $item->property_id) }}"
                                    class="btn btn-outline-dark w-100 rounded-3">
                                    {{ __('properties.view_details') }}
                                </a>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        @endif

    </div>
@endsection
