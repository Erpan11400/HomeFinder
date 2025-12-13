@extends('template') 

@section('content')
<div class="container mt-5">
    <div class="">
        Test, cek role
        Role: <strong>{{ auth()->user()->role }}</strong>
    </div>
</div>
@endsection