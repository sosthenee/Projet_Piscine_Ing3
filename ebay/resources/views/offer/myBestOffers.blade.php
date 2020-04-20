@extends('layouts.layout')

@section('content')
@php
$id_item_temp=-1;
@endphp
@if($user->role==='buyer' || $user->role==='buyerseller')
@if($utilisateur===1)

@foreach($items as $item)
@if($id_item_temp<>$item->id)
<div id="accordion">
  <div class="card">
    <div class="card-header">
      <h5 class="mb-0">
          <button class="btn btn-link" style="float: left;"  data-toggle="collapse" data-target={{"#i" . $item->id}} aria-expanded="true" aria-controls="{{"i".$item->id}}">
          <strong>{{$item->title}}</strong>
          </button>
              <form action="/mybestoffA/{{$item->id}}" method="post">  
              {{ csrf_field() }}
              <input hidden type="number" name="utilisateu" value="{{$utilisateur}}">
              <input type="submit" class="btn btn-primary"style="float: right;" value="Répondre"></p>
              </form>
            </h5>
          </div>

              <div id="{{"i".$item->id}}" class="collapse "  data-parent="#accordion">
                <div class="card-body">
                    <ul>
                    <li><strong>Id :</strong> {{$item->id}}</li>
                    <li><strong>Price :</strong> {{$item->price}} €</li>
                    <li><strong>category :</strong> {{$item->Category}}</li>
                    <li><strong>descrition :</strong>{{$item->Description}}</li>
                    </ul>
                </div>
              </div>
            </div>
          </div>
          @endif
@endforeach
@endif
@endif

@if($user->role==='seller'||$user->role==='admin' || $user->role==='buyerseller')
@if($utilisateur===2)
@foreach($items as $item)
@if($id_item_temp<>$item->id)
<div id="accordion">
  <div class="card">
    <div class="card-header">
      <h5 class="mb-0">
          <button class="btn btn-link" style="float: left;"  data-toggle="collapse" data-target={{"#i" . $item->id}} aria-expanded="true" aria-controls="{{"i".$item->id}}">
          <strong>{{$item->title}}</strong>
          </button>
          <form action="/mybestoffV/{{$item->id}}" method="post">  
            {{ csrf_field() }}
               <input hidden type="number" name="utilisateu" value="{{$utilisateur}}">
              <input type="submit" class="btn btn-primary" style="float: right;"  value="Répondre">
          </form>
       </h5>
    </div>

    <div id="{{"i".$item->id}}" class="collapse "  data-parent="#accordion">
      <div class="card-body">
          <ul>
          <li><strong>Id :</strong> {{$item->id}}</li>
          <li><strong>Price :</strong> {{$item->price}} €</li>
          <li><strong>category :</strong> {{$item->Category}}</li>
          <li><strong>descrition :</strong>{{$item->Description}}</li>
          </ul>
      </div>
    </div>
</div>
</div>

<br><br>
@php
$id_item_temp=$item->id ;
@endphp
@endif
@endforeach
@endif
@endif
@endsection 
