@extends('layouts.Layout')

@section('navbar')
    @include('components.Navbar')
@endsection

@section('content')
    <main class="container py-5">
        <div class="row g-4 align-items-start mb-5">

            {{-- image --}}
            <div class="col-lg-6">
                <img src="{{ $property->photo ?? 'https://via.placeholder.com/800x500' }}"
                    class="img-fluid rounded-3 shadow-sm w-100" alt="{{ $property->title }}">
            </div>

            {{-- property info --}}
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">

                        <h2 class="text-primary fw-bold mb-1">
                            Rp {{ number_format($property->price, 0, ',', '.') }}
                        </h2>

                        <p class="text-muted mb-2">
                            {{ __('property.owner') }}: {{ $property->owner_name }}
                        </p>



                        <p class="fw-semibold mb-4">
                            {{ $property->title }} <br>
                            <span class="text-muted fs-6">
                                {{ $property->city }}, {{ $property->country }}
                            </span>
                        </p>


                        <div class="row g-3 mb-4 text-center">
                            <div class="col-4">
                                <div class="border rounded-3 py-3">
                                    <div class="fw-semibold">{{ $property->area_l * $property->area_w }} m²</div>
                                    <small class="text-muted">{{ __('property.total_area') }}</small>

                                </div>
                            </div>
                            <div class="col-4">
                                <div class="border rounded-3 py-3">
                                    <div class="fw-semibold">{{ number_format($property->bed_room, 0) }}</div>
                                    <small class="text-muted">{{ __('property.bedrooms') }}</small>

                                </div>
                            </div>
                            <div class="col-4">
                                <div class="border rounded-3 py-3">
                                    <div class="fw-semibold">{{ number_format($property->bath_room, 0) }}</div>
                                    <small class="text-muted">{{ __('property.bathrooms') }}</small>

                                </div>
                            </div>
                        </div>


                        {{-- Bagian purchase & favorites --}}
                        <div class="d-grid gap-2">
                            @if($property->user_id == null)
                            <a href="{{ route('payment', $property->property_id) }}" class="btn btn-primary fw-semibold">
                                {{ __('property.purchase') }}
                            </a>
                            @else
                                <span class="py-2 bg-warning text-center text-danger-emphasis fw-bolder rounded">{{ __('property.already_sold')}}</span>
                            @endif


                            @php
                                $isFavorite =
                                    auth()->check() &&
                                    auth()->user()->role === 'user' &&
                                    auth()->user()->favorites->contains($property->property_id);
                            @endphp
                            {{-- FAVORITE (USER ONLY) --}}
                            @auth
                                @if (auth()->user()->role === 'user')
                                    @if (!$isFavorite)
                                        <form action="{{ route('favorite.store', $property) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-outline-danger fw-semibold w-100">
                                                {{ __('property.add_favorite') }}
                                            </button>

                                        </form>
                                    @else
                                        <form action="{{ route('favorite.remove', $property) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger fw-semibold w-100">
                                                {{ __('property.remove_favorite') }}
                                            </button>

                                        </form>
                                    @endif
                                @endif
                            @endauth

                            {{-- GUEST --}}
                            @guest
                                <a href="{{ route('login') }}" class="btn btn-outline-secondary fw-semibold">
                                    {{ __('property.login_favorite') }}
                                </a>

                            @endguest
                        </div>

                    </div>
                </div>
            </div>

        </div>

        {{-- summary --}}
        <section class="mb-5">
            <h3 class="fw-semibold mb-3">
                {{ __('property.summary') }}
            </h3>

            <p class="text-secondary lh-lg">
                {{ $property->summary }}
            </p>
        </section>


        {{-- bagian hgihlights --}}
        <section class="my-5">
            <div class="row g-4 text-center mb-8 mt-8">
                @foreach (collect([['icon' => '📍', 'title' => 'Lokasi Strategis', 'desc' => 'Akses mudah ke berbagai area penting'], ['icon' => '🛡️', 'title' => 'Lingkungan Aman', 'desc' => 'Keamanan terjaga dan nyaman'], ['icon' => '👨‍👩‍👧', 'title' => 'Ramah Keluarga', 'desc' => 'Ideal untuk hunian keluarga'], ['icon' => '🏙️', 'title' => 'Dekat Pusat Kota', 'desc' => 'Mobilitas cepat & efisien'], ['icon' => '📈', 'title' => 'Investasi Menjanjikan', 'desc' => 'Nilai properti terus meningkat'], ['icon' => '🌊', 'title' => 'Bebas Banjir', 'desc' => 'Lingkungan aman dari banjir']])->shuffle()->take(3) as $item)
                    <div class="col-md-4 col-sm-6">
                        <div class="card h-100 border-0 shadow-sm rounded-4">
                            <div class="card-body p-4">
                                <div class="fs-1 mb-3">{{ $item['icon'] }}</div>
                                <h6 class="fw-semibold mb-2">{{ $item['title'] }}</h6>
                                <p class="text-muted small mb-0">
                                    {{ $item['desc'] }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>




        {{-- Info card property --}}
        <section class="row g-4 mb-5">

            <div class="col-md-3 col-sm-6">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <p class="text-muted mb-1">{{ __('property.dimension') }}</p>

                        <h5 class="fw-semibold">
                            {{ $property->area_l }}m × {{ $property->area_w }}m
                        </h5>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <p class="text-muted mb-1">{{ __('property.total_size') }}</p>

                        <h5 class="fw-semibold">
                            {{ $property->area_l * $property->area_w }} m²
                        </h5>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <p class="text-muted mb-1">{{ __('property.rating') }}</p>

                        <h5 class="fw-semibold">
                            {{ rand(40, 49) / 10 }} ⭐
                        </h5>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <p class="text-muted mb-1">{{ __('property.bedrooms') }}</p>

                        <h5 class="fw-semibold">{{ number_format($property->bed_room, 0) }}</h5>
                    </div>
                </div>
            </div>

        </section>



        {{-- Lokasi map --}}
        <section class="mb-5">
            <h4 class="fw-semibold mb-3">
                {{ __('property.location') }}
            </h4>


            <div class="ratio ratio-16x9 rounded-3 overflow-hidden shadow-sm">
                <iframe src="https://maps.google.com/maps?q={{ urlencode($property->city) }}&z=13&output=embed"
                    loading="lazy">
                </iframe>
            </div>
        </section>

    </main>
@endsection
