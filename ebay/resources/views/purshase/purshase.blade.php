
@extends('layouts.layout')
@section('content')
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

  <h1>Mes commandes  </h1>
  <br> <br><br>

  <div class="row justify-content-center">
    @foreach ($offers as $offer)
      @if($offer->state == "wait seller")
        <div class="card border-warning mb-3" style="margin: 0px 20px 0px 0px; max-width: 18rem;"> 
      @endif
      @if($offer->state == "refuse")
        <div class="card border-danger mb-3" style="margin: 0px 20px 0px 0px; max-width: 18rem;"> 
      @endif
      @if($offer->state == "valid")
        <div class="card border-success mb-3" style="margin: 0px 20px 0px 0px; max-width: 18rem;"> 
      @endif

      <div class="card-header">{{$offer->Title}}</div>
        <div class="card-body">
          
          <div style="margin: 20px; width: 100%;">
            <h6>{{$offer->Category}}</h6>
            nom vendeur: <strong>{{$offer->seller_username}}</strong>
            <p>Price : <strong>{{$offer->price}}€</strong></p>
            <p>Delivery adress : <strong>{{$offer->inject_street}}<br>{{$offer->inject_city}}</strong></p>
            <p>Name <strong>{{$offer->inject_firstName}}</strong></p>
            <p>Delivery Date <strong>will be sent in your bill</strong></p>
            <p>Pay date <strong>{{$offer->inject_date}}</strong></p>
            <p>Type <strong>{{$offer->offer_type}}</strong></p>
          </div>
          <img class="img-thumbnail" style="height: 100px; margin: 20px;" src="/storage/{{$offer->inject_medias->reference}}"/> 
        </div>
      </div>

    @endforeach

  </div>
@endsection