@extends('layouts.base')

@section('content')

<table class="table">
    <thead>
      <tr>
        <th scope="col">Title</th>
        <th scope="col">description</th>
        <th scope="col">Start</th>
        <th scope="col">End</th>
        <th scope="col">Amount</th>
        <th scope="col">Price</th>
        <th scope="col">City</th>
        <th scope="col">address</th>
        <th scope="col">Zipcode</th>
        <th scope="col">Category</th>
      </tr>
    </thead>
    <tbody>
        <tr>
          <td>{{$event->title}}</td>
          <td>{{ $event->description}}</td>
          <td>{{ $event->start_date}}</td>
          <td>{{ $event->end_date}}</td>
          <td>{{ $event->amount_tickets}}</td>
          <td>{{ $event->price}}</td>
          <td>{{ $event->city}}</td>
          <td>{{ $event->address}}</td>
          <td>{{ $event->zipcode}}</td>
          <td>{{ $event->category}}</td>
        </tr>
    </tbody>
  </table>
  <p>only {{$event->amountTicketsLeft()}} tickets left!</p>
  <a href="{{route('events.order', $event)}}" class="btn btn-success">Buy tickets</a>
@endsection
