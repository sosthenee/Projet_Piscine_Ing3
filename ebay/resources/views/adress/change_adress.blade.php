@extends('layouts.layout')
@section('content')

    <h1>Update adress info</h1>
    <br>

    <form method="POST" action="/adress/update/{{$delivery_addresses->id}}">
        {{ csrf_field() }}
        {{ method_field("PUT") }}
        
        <div class="card">
            <div class="card-body">
                <input class="form-control" type="text" value={{ $delivery_addresses->firstName}} name="firstName" required><br>
                <input class="form-control" type="text" value={{ $delivery_addresses->lastName}} name="lastName" required><br>
                <input class="form-control" type="number" value={{ $delivery_addresses->phoneNumber}}  name="phoneNumber" required><br>
                <input class="form-control" type="number" value={{ $delivery_addresses->number}} name="number" required><br>
                <input class="form-control" type="text" value={{ $delivery_addresses->street}}  name="street" required><br>
                <input class="form-control" type="text" value={{ $delivery_addresses->city}}  name="city" required><br>
                <input class="form-control" type="number" value={{ $delivery_addresses->postCode}} name="postCode" required><br>
                <input class="form-control" type="text" value={{ $delivery_addresses->country}}  name="country" required><br>
                    
                <button class="btn btn-outline-primary" type="submit" >Update</button>
            </div>
        </div>
    </form>
@endsection