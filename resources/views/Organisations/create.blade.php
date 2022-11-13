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

  <form action="{{route('organisations.store')}}" method="POST">
    @csrf

    <div class="form-group">
      <label for="">Name</label>
      <input type="text" name="Name" id="" class="form-control">
    </div>

    <div class="form-group">
      <label for="">Email</label>
      <input type="email" name="email" id="" class="form-control">
    </div>

    <div class="form-group">
      <label for="">Phone</label>
      <input type="text" name="phone" id="" class="form-control">
    </div>    
    <input type="submit" class="text-primary" value="Create new organisation">

  </form>
@endsection