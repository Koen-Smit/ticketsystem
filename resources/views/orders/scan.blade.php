@extends('layouts.base')

@section('content')
    <p class="h5 mt-4">Uw individuele ticket:</p>

    {{-- <div class="order">
        <p>Ordernummer:  <span class="text-info">{{$order->id}}</span></p>
        <p>Betaalt met: <span class="text-info">{{$order->payment_method}}</span></p>

        <p class="h5 mt-4">Overzicht van bestelde tickets:</p>
        <ul class="list-group">
            @foreach($order->tickets as $ticket)
                <li class="list-group-item @if($ticket->scanned_at) list-group-item-danger @endif">ticket nummer: {{ $ticket->id }}, evenememt: {{ $ticket->event->title }}
                    <div class="code">
                        <p>Qr-code:</p>
                        <a href="{{ route('orders.scan', $ticket->id) }}">
                            <img src="{{ (new chillerlan\QRCode\QRCode)->render(route('orders.scan', $ticket->id)) }}" alt="">
                        </a>
                    </div>
                </li>
            @endforeach
        </ul>
    </div> --}}
@endsection