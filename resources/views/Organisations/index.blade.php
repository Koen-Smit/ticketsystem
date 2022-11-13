@extends('layouts.base')

@section('content')
<div class="mb-4"></div>
@if(session('message'))
    {{ session('message') }}
@endif
<h1 class="display-3">Organisations</h1>
@foreach ($orgs as $org)
    <div class="card mt-3">
        <div class="card-body">
            <h5 class="card-title h5">{{ $org->name }}</h5>
            <h6 class="card-subtitle mt-2 text-muted">{{ $org->email }}</h6>
            <p class="card-text mb-2 text-muted">{{ $org->phone }}</p>
        </div>
    </div>
@endforeach

<a class="mt-5 btn btn-primary" href="{{route ('organisations.create')}}">Create organisation</a>
@endsection