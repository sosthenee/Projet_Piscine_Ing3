@extends('layouts.layout')

@section('content')

@if($user->role==='buyer' || $user->role==='buyerseller')
@if($utilisateur===1)
@foreach($items as $item)
<form action="/mybestoffA/{{$item->id}}" method="post">  
<p>{{$item->id }}------{{$item->price }}------{{$item->title }}<input type="submit" class="btn btn-primary" value="Répondre"></p>

                     {{ csrf_field() }}
                    <input hidden type="number" name="utilisateu" value="{{$utilisateur}}">
                    
                </form>

@endforeach
@endif
@endif

@if($user->role==='seller'||$user->role==='admin' || $user->role==='buyerseller')
@if($utilisateur===2)
@foreach($items as $item)
<form action="/mybestoffV/{{$item->id}}" method="post">  
<p>{{$item->id }}------{{$item->price }}------{{$item->title }}</p>

                     {{ csrf_field() }}
                      <input hidden type="number" name="utilisateu" value="{{$utilisateur}}">

                    <input type="submit" class="btn btn-primary" value="Répondre">
                </form>
@endforeach
@endif
@endif
@endsection 
