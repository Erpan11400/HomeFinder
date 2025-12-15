@extends('layouts.Layout')

@section('navbar')
    @include('components.AdminNavbar')
@endsection

@section('content')

{{-- HEADER SECTION --}}
<section class="py-5" style="background-color: #e5e5e5;">
    <div class="container">

        <h2 class="fw-bold text-center mb-4">Your Properties</h2>

        <div class="row justify-content-center g-4">

            <div class="col-12 col-md-3">
                <div class="bg-white shadow-sm rounded-4 text-center p-4">
                    <h3 class="fw-bold">{{ session('adminProp')->count() }}</h3>
                    <p class="text-muted mb-0">Total Properties</p>
                </div>
            </div>

            <div class="col-12 col-md-3">
                <div class="bg-white shadow-sm rounded-4 text-center p-4">
                    <h3 class="fw-bold">{{ session('adminProp')->where('user_id', null)->count() }}</h3>
                    <p class="text-muted mb-0">Available</p>
                </div>
            </div>

            <div class="col-12 col-md-3">
                <div class="bg-white shadow-sm rounded-4 text-center p-4">
                    <h3 class="fw-bold">{{ session('adminProp')->where('user_id', !null)->count() }}</h3>
                    <p class="text-muted mb-0">Sold</p>
                </div>
            </div>

        </div>

    </div>
</section>

{{-- MY LISTINGS SECTION --}}
<section class="py-5">
    <div class="container">

        {{-- Header --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold mb-0">My Listings</h4>
            <a href="{{ route('admin.property.create') }}" class="btn btn-primary">
                + Add Property
            </a>
        </div>

        {{-- Table --}}
        <div class="card shadow-sm border-0 rounded-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Property</th>
                            <th>City</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach(session('adminProp') as $prop)
                        @if($prop->user_id == null)
                        <tr>
                            <td>{{$prop->owner_name}}</td>
                            <td>{{ $prop->city }}</td>
                            <td>Rp {{ number_format($prop->price, 0, ',', '.') }}</td>
                            <td>
                                <span class="badge bg-success">Available</span>
                            </td>
                            <td class="text-end">
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('admin.property.edit', $prop->property_id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('admin.property.destroy', $prop->property_id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @else
                        <tr>
                            <td>{{$prop->owner_name}}</td>
                            <td>{{ $prop->city }}</td>
                            <td>Rp {{ number_format($prop->price, 0, ',', '.') }}</td>
                            <td>
                                <span class="badge bg-secondary">Sold</span>
                            </td>
                            <td class="text-end">
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('admin.property.edit', $prop->property_id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('admin.property.destroy', $prop->property_id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section>


@endsection