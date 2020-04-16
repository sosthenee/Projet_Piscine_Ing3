
@extends('layouts.layout')
@section('content')

<h1>page payment test </h1>

@foreach ($payement_infos as $payment_info)
<ul class="list-group list-group-flush">
<li class="list-group-item"> {{ $payment_info->cardType}} </li>
<li class="list-group-item"> {{ $payment_info->cardNumber}} </li>
<li class="list-group-item"> {{ $payment_info->cardName}} </li>
<li class="list-group-item"> {{ $payment_info->expirationDate}} </li>
<li class="list-group-item"> {{ $payment_info->securityCode}} </li>
</ul>
<form method="POST" action="/payment/{{$payment_info->id}}">
    {{ csrf_field() }}
    {{ method_field("DELETE") }}
    <br>
    <button class="btn btn-outline-danger" type="submit" >delete</button>
    <a href="{{ url('/payment/update_payment/' . $payment_info->id) }}" style="float: right;" class="btn btn-xs btn-info pull-right">Edit</a>
    <br>
</form>
<br> <br>



@endforeach
<br> <br> <br>
<h2>Add a new one</h2>
<form method="POST" action="/payment/create">
    {{ csrf_field() }}



    <input class="form-control" type="text" placeholder=" cardType" name="cardType" required><br>
    
    <input class="form-control" type="text" placeholder=" cardName"  name="cardName" required><br>
    <input class="form-control" type="number" placeholder=" cardNumber" name="cardNumber" required><br>
    <input class="form-control"type="date" id="start_date_payment" placeholder=" expirationDate" name="expirationDate" required><br>
    <input class="form-control" type="number" placeholder=" securityCode" name="securityCode"  aria-describedby="cardhelp" required><br>
    <small id="cardhelp" class="form-text text-muted">We'll never share your private informations with anyone else.</small><br>

    <button class="btn btn-outline-success" type="submit" >Create</button>


</form>

@endsection