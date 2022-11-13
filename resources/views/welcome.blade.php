@extends('layouts.base')

@section('content')
  <h1 class="display-3">Home</h1>
  @if (auth()->user())
  <p></p>
  @else
  <p>U moet een account maken of inloggen om van de site gebruik te kunnen maken.</p>
  @endif
  
  @auth
    <p class="lead mt-1">Welkom {{ auth()->user()->name }}</p>
    <p>u bent ingelogd!</p>
  <h2 class="mt-5">Uw orders:</h2>
  <ul class="list-group mt-2">
    @foreach(\Auth::user()->orders as $order)
      <a class="text-decoration-none" href="{{ route('orders.confirm', $order->id) }}">
        <li class="list-group-item">
            {{ $order->id }} - gedaan op: {{$order->created_at}}
        </li>
      </a>
    @endforeach
  </ul>
  @endauth
@endsection
