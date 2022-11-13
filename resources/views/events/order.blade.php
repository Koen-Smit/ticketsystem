@extends('layouts.base')

@section('content')
@if (session('message'))
  <div class="alert alert-danger">
    {{ session('message') }}
  </div>
@endif
<h1>Order tickets for {{$event->title}}</h1>

<form action="{{route('events.order', $event)}}" method="POST">
  @csrf


  <div class="form-group">
    <label for="">Name</label>
    <input type="text" name="name" id="" class="form-control">
  </div>

  <div class="form-group">
    <label for="">Amount of tickets</label>
    <input type="number" name="amount_tickets" id="amount-tickets" class="form-control">
  </div>

  <div class="form-group">
    <label for="">Payment method</label>
    <select name="payment_method" id="" class="form-control">
      <option value="ideal">iDeal</option>
      <option value="paypal">Paypal</option>
      <option value="creditcard">Creditcard</option>
    </select>
  </div>

  <p>Totaalprijs: <span id="total-price"></span></p>

  <button type="submit" class="text-primary">Order</button>
</form>
<script>
  let amountTicketsEl = document.getElementById('amount-tickets');
  let totalPriceEl = document.getElementById('total-price');

  amountTicketsEl.addEventListener('change', () => {
      totalPriceEl.innerHTML = amountTicketsEl.value * {{$event->price}};
  });
</script>
@endsection