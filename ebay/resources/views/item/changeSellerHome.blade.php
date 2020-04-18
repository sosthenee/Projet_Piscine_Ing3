@extends('layouts.layout')
@section('content')

<h1>Update selling Item info</h1>
<br>
<form method="POST" action="/vendre/update/{{$item_infos->id}}">
    {{ csrf_field() }}
    {{ method_field("PUT") }}

    <div class="card">
        <div class="card-body">
    
    <input class="form-control" type="text" value={{ $item_infos->Title}} name="title" required><br>
    <input class="form-control" type="text" value={{ $item_infos->Description}}  name="description" required><br>
    
    <button class="btn btn-outline-primary" type="submit" >Update</button>
        </div>
    </div>
</form>
@endsection