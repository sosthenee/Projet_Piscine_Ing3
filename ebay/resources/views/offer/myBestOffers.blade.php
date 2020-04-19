@extends('layouts.layout')

@section('content')

@if($user->role==='buyer')
@foreach($items as $item)
<form action="/mybestoffA/{{$item->id}}" method="post">  
<p>{{$item->id }}------{{$item->price }}------{{$item->title }}</p>

                     {{ csrf_field() }}
  
                    <input type="submit" class="btn btn-primary" value="Répondre">
                </form>

@endforeach
@endif
@if($user->role==='seller'||$user->role==='admin')
@foreach($items as $item)
<form action="/mybestoffV/{{$item->id}}" method="post">  
<p>{{$item->id }}------{{$item->price }}------{{$item->title }}</p>

                     {{ csrf_field() }}
  
                    <input type="submit" class="btn btn-primary" value="Répondre">
                </form>

@endforeach
@endif

@endsection
