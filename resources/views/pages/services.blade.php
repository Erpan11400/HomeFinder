@extends('layouts.Layout')

@section('navbar')
@include('components.Navbar')
@endsection

@section('content')

<div class="container py-5">

    {{-- HERO --}}
    <section class="text-center mb-5">
        <h1 class="fw-bold">Our Services</h1>
        <p class="text-muted fs-5 col-lg-8 mx-auto">
            Everything you need to discover, purchase, and manage properties with confidence and ease.
        </p>
    </section>

    {{-- SERVICES --}}
    <section class="mb-5">
        <div class="row g-4">

            @foreach ([

    ['icon' => '🏠', 'title' => 'Property Discovery', 'desc' => 'Explore verified residential and commercial properties with smart filters and detailed information.'],
    ['icon' => '🔒', 'title' => 'Secure Transactions', 'desc' => 'Enjoy a safe, transparent, and trusted purchasing process supported by professionals.'],
    ['icon' => '🧑‍💼', 'title' => 'Expert Consultation', 'desc' => 'Get professional guidance tailored to your needs and investment goals.'],
    ['icon' => '⭐', 'title' => 'Favorite & Compare', 'desc' => 'Save and compare properties easily to make better decisions.'],
    ['icon' => '📈', 'title' => 'Investment Insights', 'desc' => 'Access property insights to evaluate long-term value and growth potential.'],
    ['icon' => '🛠️', 'title' => 'After-Sales Support', 'desc' => 'We stay with you even after purchase to ensure satisfaction and clarity.'],

            ] as $service)

            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm rounded-4">
                    <div class="card-body p-4 text-center">
                        <div class="fs-1 mb-3">{{ $service['icon'] }}</div>
                        <h5 class="fw-semibold mb-2">{{ $service['title'] }}</h5>
                        <p class="text-muted small mb-0">
                            {{ $service['desc'] }}
                        </p>
                    </div>
                </div>
            </div>

            @endforeach

        </div>
    </section>


    {{-- CTA --}}
    <section class="text-center">
        <h4 class="fw-semibold mb-3">So what are you waiting for?</h4>
        <p class="text-muted mb-4">
            Start exploring our listings and take the next step toward your ideal property.
        </p>

        <a href="{{ route('properties.list') }}" class="btn btn-primary px-4 fw-semibold">
            Browse Properties
        </a>
    </section>

</div>

@endsection
