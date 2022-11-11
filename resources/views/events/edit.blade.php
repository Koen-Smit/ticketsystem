@extends('layouts.base')

@section('content')
@if(session('message'))
    {{ session('message') }}
@endif
<h1 class="display-1">Edit Event</h1>
@if($errors)
    <ul class="list-group">
        @foreach($errors->all() as $error)
            <li class="list-group-item list-group-item-danger">{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{route('events.update', $event)}}" method="POST">
  @method('put')
  @csrf

  <div class="form-group">
    <label for="">Organisatie</label>
    <select name="organisation_id" class="form-control" id="">
        @foreach ($orgs as $org)

          <option @if($org->id == $event->organisation_id) selected @endif value="{{$org->id}}">{{$org->name}}</option>

        @endforeach
    </select>
  </div>

  <div class="form-group">
    <label for="">Title</label>
    <input value='{{$event->title}}' type="text" name="title" id="" class="form-control">
  </div>

  <div class="form-group">
    <label for="">Description</label>
    <textarea name="description" id="" class="form-control" cols="30" rows="10">{{$event->description}}</textarea>
  </div>

  <div class="form-group">
    <label for="">Start date</label>
    <input value='{{$event->start_date}}' type="datetime-local" name="start_date" id="" class="form-control">
  </div>

  <div class="form-group">
    <label for="">End date</label>
    <input value='{{$event->end_date}}' type="datetime-local" name="end_date" id="" class="form-control">
  </div>

  <div class="form-group">
    <label for="">Amount of tickets</label>
    <input value='{{$event->amount_tickets}}' type="number" steps="0,1" name="amount_tickets" id="" class="form-control">
  </div>

  <div class="form-group">
    <label for="">Price</label>
    <input value='{{$event->price}}' type="text" name="price" id="" class="form-control">
  </div>

  <div class="form-group">
    <label for="">City</label>
    <input value='{{$event->city}}' type="text" name="city" id="" class="form-control">
  </div>

  <div class="form-group">
    <label for="">Address</label>
    <input value='{{$event->address}}' type="text" name="address" id="" class="form-control">
  </div>

  <div class="form-group">
    <label for="">Zipcode</label>
    <input value='{{$event->zipcode}}' type="text" name="zipcode" id="" class="form-control">
  </div>

  
  <div class="form-group">
    <label for="">Category</label>
    <input value='{{$event->title}}' type="text" name="category" id="" class="form-control">
  </div>
  
  <input type="submit" class="btn btn-primary" value="Create new event">

</form>
@endsection