@extends('layouts.Layout')

@section('navbar')
    @include('components.Title')
@endsection

@section('content')
    <section class="d-flex align-items-center justify-content-center" style="min-height: calc(100vh - 80px);">
        <div class="card shadow-sm border-0 rounded-4 p-4" style="max-width: 400px; width: 100%;">
            <div class="card-body text-center">

                {{-- TITLE --}}
                <h3 class="fw-bold mb-2">
                    {{ __('auth.register_title') }} 🏠
                </h3>

                <p class="text-muted small mb-4">
                    {{ __('auth.register_subtitle') }}
                </p>

                {{-- FORM --}}
                <form action="{{ route('register') }}" method="POST">
                    @csrf

                    {{-- NAME --}}
                    <div class="mb-3 text-start">
                        <label class="form-label fw-semibold">
                            {{ __('auth.name') }}
                        </label>
                        <input type="text" name="name" class="form-control" placeholder="{{ __('auth.name') }}"
                            required>
                    </div>

                    {{-- EMAIL --}}
                    <div class="mb-3 text-start">
                        <label class="form-label fw-semibold">
                            {{ __('auth.email') }}
                        </label>
                        <input type="email" name="email" class="form-control" placeholder="{{ __('auth.email') }}"
                            required>
                    </div>

                    {{-- PASSWORD --}}
                    <div class="mb-3 text-start">
                        <label class="form-label fw-semibold">
                            {{ __('auth.password') }}
                        </label>
                        <input type="password" name="password" class="form-control" placeholder="{{ __('auth.password') }}"
                            required>
                    </div>

                    {{-- CONFIRM PASSWORD --}}
                    <div class="mb-3 text-start">
                        <label class="form-label fw-semibold">
                            {{ __('auth.password_confirm') }}
                        </label>
                        <input type="password" name="password_confirmation" class="form-control"
                            placeholder="{{ __('auth.password_confirm') }}" required>
                    </div>

                    {{-- SUBMIT --}}
                    <button type="submit" class="btn btn-primary w-100 fw-semibold py-2">
                        {{ __('auth.register') }}
                    </button>

                    {{-- LOGIN LINK --}}
                    <p class="mt-3 small text-muted">
                        {{ __('auth.already_account') }}
                        <a href="{{ route('login') }}" class="text-primary fw-semibold text-decoration-none">
                            {{ __('auth.login_here') }}
                        </a>
                    </p>
                </form>

            </div>
        </div>
    </section>
@endsection
