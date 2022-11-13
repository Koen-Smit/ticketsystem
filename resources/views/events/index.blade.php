@extends('layouts.base')

@section('content')
@if(session('message'))
    {{ session('message') }}
@endif
<h1 class="display-3">Events</h1>
<p>- Klik op de titel om tickets te bestellen.</p>
<p>- Deleten werkt niet als er al tickets bij dat evenement besteld zijn.</p>
<ul>
  <table class="table">
    <thead>
      <tr>
        <th scope="col ">Title</th>
        <th scope="col">description</th>
        <th scope="col">Start</th>
        <th scope="col">End</th>
        <th scope="col">Amount</th>
        <th scope="col">Price</th>
        <th scope="col">City</th>
        <th scope="col">address</th>
        <th scope="col">Zipcode</th>
        <th scope="col">Category</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($events as $event)
        <tr>
          <td><a class="text-danger" href="{{route('events.show', $event->id)}}">{{$event->title}}</a></td>
          <td>{{ $event->description}}</td>
          <td>{{ $event->start_date}}</td>
          <td>{{ $event->end_date}}</td>
          <td>{{ $event->amount_tickets}}</td>
          <td>{{ $event->price}}</td>
          <td>{{ $event->city}}</td>
          <td>{{ $event->address}}</td>
          <td>{{ $event->zipcode}}</td>
          <td>{{ $event->category}}</td>
          <td><a href="{{route('events.edit', $event)}}" class="btn btn-info">Edit</a></td>
          <td>
            <form action="{{route('events.destroy', $event)}}" method="POST">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</ul>
<a class="btn btn-primary" href="{{route ('events.create')}}">Create</a>
@endsection