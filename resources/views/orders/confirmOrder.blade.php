@extends('layouts.base')

@section('content')
    <h2>bedankt voor uw bestelling!!</h2>
    <h3>Hier zijn uw bestelgegevens</h3>

    <div class="order">
        <p>Ordernummer:  {{$order->id}}</p>
        <p>Betaalt met: {{$order->payment_method}}</p>

        <h3>Overzicht van bestelde tickets </h3>
        <ul class="list-group">
            @foreach($order->tickets as $ticket)
                <li class="list-group-item @if($ticket->scanned_at) list-group-item-danger @endif">ticket nummer: {{ $ticket->id }}, evenememt: {{ $ticket->event->title }}
                    <div class="code">
                        <p>Qr-code:</p>
                        <a href="{{ route('tickets.scan', $ticket->id) }}">
                            <img src="{{ (new chillerlan\QRCode\QRCode)->render(route('tickets.scan', $ticket->id)) }}" alt="">
                        </a>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection