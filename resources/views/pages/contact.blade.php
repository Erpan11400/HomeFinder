@extends('layouts.Layout')

@section('navbar')
    @include('components.Navbar')
@endsection

@section('content')
    <div class="container py-5">

        <div class="row justify-content-center">
            <div class="col-lg-7">

                {{-- PAGE HEADER --}}
                <div class="text-center mb-4">
                    <h1 class="fw-bold">
                        {{ __('contact.title') }}
                    </h1>

                    <p class="text-muted fs-5">
                        {{ __('contact.subtitle') }}
                    </p>
                </div>


                {{-- SUCCESS MESSAGE --}}
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ __('contact.success') }}
                    </div>
                @endif


                {{-- ERROR MESSAGE --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- CONTACT FORM --}}
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4 p-md-5">

                        <form method="POST" action="{{ route('contact.submit') }}">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    {{ __('contact.name_label') }}
                                </label>
                                <input type="text" name="name" class="form-control form-control-lg"
                                    placeholder="{{ __('contact.name_placeholder') }}" value="{{ old('name') }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    {{ __('contact.email_label') }}
                                </label>
                                <input type="email" name="email" class="form-control form-control-lg"
                                    placeholder="{{ __('contact.email_placeholder') }}" value="{{ old('email') }}">
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-semibold">
                                    {{ __('contact.message_label') }}
                                </label>
                                <textarea name="message" class="form-control form-control-lg" rows="4"
                                    placeholder="{{ __('contact.message_placeholder') }}">{{ old('message') }}</textarea>
                            </div>


                            <button class="btn btn-primary btn-lg w-100 rounded-3">
                                {{ __('contact.button') }}
                            </button>

                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
