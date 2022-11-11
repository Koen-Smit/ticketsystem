@extends('layouts.base')

@section('content')
  <h1>Hello homepage!</h1>
  

  @auth
    <p>Welkom {{ auth()->user()->name }}</p>
  <h2>Uw orders</h2>
  <ul class="list-group">
    @foreach(\Auth::user()->orders as $order)
      <a class="text-decoration-none" href="{{ route('tickets.scan', $order->id) }}">
        <li class="list-group-item">
            {{ $order->id }} - gedaan op: {{$order->created_at}}
        </li>
      </a>
    @endforeach
  </ul>




    <p>u bent ingelogd!</p>
  @endauth
@endsection
