@extends('layouts.layout')
@section('content')

<h1>Update selling Item info</h1>
<br>
<form method="POST" action="/vendre/update/{{$item_infos->id}}">
    {{ csrf_field() }}
    {{ method_field("PUT") }}

    <div class="card">
        <div class="card-body">
            @for($i=0; $i < count($items); $i++)
            <img  class="d-inline-block " style="width: 30vw; height: 18vw; "  src="/storage/{{$items[$i]->reference}}"  >
            <div>delete
            <input type="checkbox" name={{"d".$items[$i]->id}}> 
        </div>
            @endfor
    
<br>
<br>
    <input class="form-control" type="text" value={{ $item_infos->Title}} name="title" required><br>
    <input class="form-control" type="text" value={{ $item_infos->Description}}  name="description" required><br>
    
    <button class="btn btn-outline-primary" type="submit" >Update</button>
        </div>
    </div>
</form>
@endsection