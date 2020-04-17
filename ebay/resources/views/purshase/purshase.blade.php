
@extends('layouts.layout')
@section('content')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

<h1>Historic Commands  </h1>

@foreach ($purshases as $purshase)
<ul> 
  <li>{{$purshase->id}}</li>
  <li>{{$purshase->paiement_date}}</li>
  <li>{{$purshase->delivery_date}}</li>                      
  <li>{{$purshase->state}}</li>
</ul>  
  @endforeach
@endsection