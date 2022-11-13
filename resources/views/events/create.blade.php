@extends('layouts.base')

@section('content')
  <h1 class="display-1">Create new Event</h1>
  @if($errors)
      <ul class="list-group">
          @foreach($errors->all() as $error)
              <li class="list-group-item list-group-item-danger">{{ $error }}</li>
          @endforeach
      </ul>
  @endif

  <form action="{{route('events.store')}}" method="POST">
    @csrf

    <div class="form-group">
      <label for="">Organisatie</label>
      <select name="organisation_id" class="form-control" id="">
          @foreach ($orgs as $org)
            <option value="{{$org->id}}">{{$org->name}}</option>
          @endforeach
      </select>
    </div>

    <div class="form-group">
      <label for="">Title</label>
      <input required type="text" name="title" id="" class="form-control">
    </div>

    <div class="form-group">
      <label for="">Description</label>
      <textarea name="description" id="" class="form-control" cols="30" rows="10"></textarea>
    </div>

    <div class="form-group">
      <label for="">Start date</label>
      <input type="datetime-local" name="start_date" id="" class="form-control">
    </div>

    <div class="form-group">
      <label for="">End date</label>
      <input type="datetime-local" name="end_date" id="" class="form-control">
    </div>

    <div class="form-group">
      <label for="">Amount of tickets</label>
      <input type="number" steps="0,1" name="amount_tickets" id="" class="form-control">
    </div>

    <div class="form-group">
      <label for="">Price</label>
      <input type="text" name="price" id="" class="form-control">
    </div>

    <div class="form-group">
      <label for="">City</label>
      <input type="text" name="city" id="" class="form-control">
    </div>

    <div class="form-group">
      <label for="">Address</label>
      <input type="text" name="address" id="" class="form-control">
    </div>

    <div class="form-group">
      <label for="">Zipcode</label>
      <input type="text" name="zipcode" id="" class="form-control">
    </div>

    
    <div class="form-group">
      <label for="">Category</label>
      <input type="text" name="category" id="" class="form-control">
    </div>
    
    <input type="submit" class="text-primary" value="Create new event">

  </form>
@endsection