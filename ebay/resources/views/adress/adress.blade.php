@extends('layouts.layout')
@section('content')



@foreach ($delivery_addresses as $address)
<li> {{ $address->firstName}} </li>
<li> {{ $address->lastName}} </li>
<li> {{ $address->phoneNumber}} </li>
<li> {{ $address->number}} </li>
<li> {{ $address->street}} </li>
<li> {{ $address->city}} </li>
<li> {{ $address->postCode}} </li>
<li> {{ $address->country}} </li>

<form method="POST" action="/adress/{{$address->id}}">

    {{ csrf_field() }}
    {{ method_field("DELETE") }}
    <button style="danger" type="submit" >delete</button>
    
</form>

<a href="{{ url('/adress/update_adress/' . $address->id) }}" class="btn btn-xs btn-info pull-right">Edit</a>


@endforeach

Add a new one
<form method="POST" action="/adress/create">
    {{ csrf_field() }}
    
    <input type="text" placeholder=" firstName" name="firstName" required>
    <input type="text" placeholder=" lastName" name="lastName" required>
    <input type="number" placeholder=" phoneNumber"  name="phoneNumber" required>
    <input type="number" placeholder=" number" name="number" required>
    <input type="text" placeholder=" street" name="street" required>
    <input type="text" placeholder=" city" name="city" required>
    <input type="text" placeholder=" postCode" name="postCode" required>
    <input type="text" placeholder=" country" name="country" required>

    <button style="primary" type="submit" >Create</button>
</form>

@endsection