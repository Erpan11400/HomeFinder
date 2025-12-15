@extends('layouts.Layout')

@section('navbar')
    @include('components.Title')
@endsection
@section('content')
<section class="d-flex align-items-center justify-content-center" style="min-height: calc(100vh - 80px);">
    <div class="card shadow-sm border-0 rounded-4 p-4" style="max-width: 400px; width: 100%;">
        <div class="card-body text-center">

            <h3 class="fw-bold mb-2">Welcome Back 👋</h3>
            <p class="text-muted small mb-4">
                Please login to your account
            </p>

            <form action="/login" method="POST">
                @csrf

                <div class="mb-3 text-start">
                    <label class="form-label fw-semibold">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                </div>

                <div class="mb-3 text-start">
                    <label class="form-label fw-semibold">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                </div>

                <button type="submit" class="btn btn-primary w-100 fw-semibold py-2">
                    Login
                </button>

                <p class="mt-3 small text-muted">
                    Don't have an account?
                    <a href="/register"
                        class="text-primary fw-semibold text-decoration-none">
                        Register here
                    </a>
                </p>
            </form>

        </div>
    </div>
</section>
@endsection