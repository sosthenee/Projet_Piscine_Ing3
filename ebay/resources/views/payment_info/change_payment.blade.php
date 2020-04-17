@extends('layouts.layout')
@section('content')

<h1>Update payment info</h1>
<br>
<form method="POST" action="/payment/update/{{$payment_info->id}}">
    {{ csrf_field() }}
    {{ method_field("PUT") }}

    <div class="card">
        <div class="card-body">
    
    <input class="form-control" type="text" value={{ $payment_info->cardType}} name="cardType" required><br>
    <input class="form-control" type="text" value={{ $payment_info->cardName}}  name="cardName" required><br>
    <input class="form-control" type="number" value={{ $payment_info->cardNumber}} name="cardNumber" required><br>
    <input class="form-control" type="date" id="start_date_payment" value={{ $payment_info->expirationDate}} name="expirationDate" required><br>
    <input class="form-control" type="number" value={{ $payment_info->securityCode}} name="securityCode" aria-describedby="cardhelp" required><br>
    <small id="cardhelp" class="form-text text-muted">We'll never share your private informations with anyone else.</small><br>

    <button class="btn btn-outline-primary" type="submit" >Update</button>
        </div>
    </div>
</form>
@endsection