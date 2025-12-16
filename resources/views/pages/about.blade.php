@extends('layouts.Layout')

@section('navbar')
    @include('components.Navbar')
@endsection

@section('content')
    {{-- HERO ABOUT --}}
    <section class="pt-5 pb-4">
        <div class="container text-center">
            <h1 class="fw-bold mb-3">About HomeFinder</h1>
            <p class="text-muted fs-5 mx-auto" style="max-width: 720px;">
                HomeFinder is a modern property platform built to help people discover,
                buy, and manage properties with confidence.
            </p>
            <p class="text-muted mx-auto" style="max-width: 680px;">
                We simplify the property journey by connecting users with verified listings,
                transparent information, and trusted professionals.
            </p>
        </div>
    </section>

    {{-- VALUES / WHY US --}}
    <section class="py-5 bg-primary mb-5">
        <div class="container">

            <div class="row g-4">
                <div class="col-md-3 col-sm-6">
                    <div class="card h-100 border-0 shadow-sm rounded-4">
                        <div class="card-body p-4 text-center">
                            <h5 class="fw-semibold mb-2">Verified Listings</h5>
                            <p class="text-muted small mb-0">
                                Every property is carefully reviewed to ensure accuracy
                                and reliability.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="card h-100 border-0 shadow-sm rounded-4">
                        <div class="card-body p-4 text-center">
                            <h5 class="fw-semibold mb-2">User-Friendly Platform</h5>
                            <p class="text-muted small mb-0">
                                Clean interface and intuitive navigation for a smooth
                                browsing experience.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="card h-100 border-0 shadow-sm rounded-4">
                        <div class="card-body p-4 text-center">
                            <h5 class="fw-semibold mb-2">Secure Transactions</h5>
                            <p class="text-muted small mb-0">
                                Transparent and secure processes supported by trusted
                                professionals.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="card h-100 border-0 shadow-sm rounded-4">
                        <div class="card-body p-4 text-center">
                            <h5 class="fw-semibold mb-2">Professional Support</h5>
                            <p class="text-muted small mb-0">
                                Dedicated assistance from experienced agents and
                                property experts.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>


    {{-- MISSION & VISION --}}
    <section class="mb-5">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-md-6">
                    <h4 class="fw-semibold mb-3">Our Mission</h4>
                    <p class="text-muted">
                        To make property discovery and transactions accessible, transparent,
                        and trustworthy for everyone.
                    </p>
                </div>

                <div class="col-md-6">
                    <h4 class="fw-semibold mb-3">Our Vision</h4>
                    <p class="text-muted">
                        To become a leading digital property platform that empowers
                        smarter decisions and sustainable investments.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- STATS --}}
    <section class="py-5 border-top">
        <div class="container">
            <div class="row text-center g-4">
                <div class="col-md-4">
                    <h2 class="fw-bold text-primary">100+</h2>
                    <p class="text-muted mb-0">Listed Properties</p>
                </div>

                <div class="col-md-4">
                    <h2 class="fw-bold text-primary">50+</h2>
                    <p class="text-muted mb-0">Trusted Agents</p>
                </div>

                <div class="col-md-4">
                    <h2 class="fw-bold text-primary">1,000+</h2>
                    <p class="text-muted mb-0">Happy Users</p>
                </div>
            </div>
        </div>
    </section>
@endsection
