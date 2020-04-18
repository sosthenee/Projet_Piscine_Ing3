
@extends('layouts.layout')
@section('content')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

<h1>Historic Commands  </h1>
<br> <br><br>
<div class="row justify-content-center">
@foreach ($offers as $offer)
<div class="card border-warning mb-3" style="margin: 0px 20px 0px 0px; max-width: 18rem;">
  <div class="card-header">{{$offer->Title}}</div>
  <div class="card-body">
    
  <div style="margin: 20px; width: 100%;">
  <h6>{{$offer->Category}}</h6>
  nom vendeur: <strong>{{$offer->seller_username}}</strong>
  <p>Price : <strong>{{$offer->price}}€</strong></p>
  <p>Delivery adress : <strong>{{$offer->inject_street}}<br>{{$offer->inject_city}}</strong></p>
  <p>Name <strong>{{$offer->inject_firstName}}</strong></p>
  <p>Delivery Date <strong>{{$offer->inject_date_dely}}</strong></p>
  <p>Pay date <strong>{{$offer->inject_date}}</strong></p>
  
</div>
  <img class="img-thumbnail" style="height: 100px; margin: 20px;" src="/storage/{{$offer->inject_medias->reference}}"/> 
</div>
</div>

@endforeach
</div>
@endsection