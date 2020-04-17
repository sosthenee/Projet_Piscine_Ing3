@extends('layouts.layout')
@section('content')

<h1>Delivery adresses</h1>
<div class="row">
@foreach ($delivery_addresses as $address)
<div class="col-sm-4">
<div class="card">
    <div class="card-body">

<ul class="list-group list-group-flush">
    <div class="form-row">
        <div class="form-group col-md-6">
            <li class="list-group-item"> {{ $address->firstName}} </li>
        </div>
        <div class="form-group col-md-6">
            <li class="list-group-item"> {{ $address->lastName}} </li>
        </div> 
    </div>
    <div class="form-group">
        <li class="list-group-item"> {{ $address->phoneNumber}} </li>
    </div>
    <div class="form-group">
        <li class="list-group-item"> {{ $address->street}} </li>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
            <li class="list-group-item"> {{ $address->number}} </li>
        </div>
        <div class="form-group col-md-9">
            <li class="list-group-item"> {{ $address->city}} </li>
        </div>
    </div> 
    <div class="form-row">
        <div class="form-group col-md-6">
            <li class="list-group-item"> {{ $address->postCode}} </li>
        </div> 
       
        <div class="form-group col-md-6">
            <li class="list-group-item"> {{ $address->country}} </li>
        </div>
    </div> 
</ul>
<br>   
<form method="POST" action="/adress/{{$address->id}}">

    {{ csrf_field() }}
    {{ method_field("DELETE") }}
    <button class="btn btn-outline-danger" type="submit" ><i class="fa fa-trash" aria-hidden="true"></i></button>
    <a href="{{ url('/adress/update_adress/' . $address->id) }}" style="float: right;" class="btn btn-xs btn-info pull-right">Edit</a>
    </div>
</div>
<br> <br>
</div>
</form>
<br> <br> 


@endforeach
</div>


<br><br>
<h1>Add a new one</h1>
<br><br>

<form method="POST" action="/adress/create">
    {{ csrf_field() }}
    
    <div class="form-row">
        <div class="form-group col-md-6">
            <input class="form-control" type="text" placeholder=" firstName" name="firstName" required>
        </div>
        <div class="form-group col-md-6">
            <input class="form-control" type="text" placeholder=" lastName" name="lastName" required>
        </div>
    </div>
    <div class="form-group">
        <input class="form-control" type="number" placeholder=" phoneNumber"  name="phoneNumber" required>
    </div>
    <div class="form-group">
        <input class="form-control" type="text" placeholder=" street" name="street" required>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <input class="form-control" type="number" placeholder=" number" name="number" required>
        </div>
        <div class="form-group col-md-4">
            <input class="form-control" type="text" placeholder=" city" name="city" required>
        </div>
        <div class="form-group col-md-2">
            <input class="form-control" type="text" placeholder=" postCode" name="postCode" required>
        </div> 
    </div>    
        <div class="form-group">
            <input class="form-control" type="text" placeholder=" country" name="country" required>
        </div>
    <button class="btn btn-primary" type="submit" >Create</button>
    <br><br>
</form>

@endsection