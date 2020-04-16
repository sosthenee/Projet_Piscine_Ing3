
@extends('layouts.layout')
@section('content')

<h1>page payment test </h1>

@foreach ($payement_infos as $payment_info)
<li> {{ $payment_info->cardType}} </li>
<li> {{ $payment_info->cardNumber}} </li>
<li> {{ $payment_info->cardName}} </li>
<li> {{ $payment_info->expirationDate}} </li>
<li> {{ $payment_info->securityCode}} </li>

<form method="POST" action="/payment/{{$payment_info->id}}">
    {{ csrf_field() }}
    {{ method_field("DELETE") }}

    <button style="danger" type="submit" >delete</button>
</form>


<a href="{{ url('/payment/update_payment/' . $payment_info->id) }}" class="btn btn-xs btn-info pull-right">Edit</a>


@endforeach

Add a new one
<form method="POST" action="/payment/create">
    {{ csrf_field() }}
    
    <input type="text" placeholder=" cardType" name="cardType" required>
    <input type="text" placeholder=" cardNumber" name="cardNumber" required>
    <input type="text" placeholder=" cardName"  name="cardName" required>
    <input type="date" placeholder=" expirationDate" name="expirationDate" required>
    <input type="number" placeholder=" securityCode" name="securityCode" required>

    <button style="primary" type="submit" >Create</button>
</form>

@endsection