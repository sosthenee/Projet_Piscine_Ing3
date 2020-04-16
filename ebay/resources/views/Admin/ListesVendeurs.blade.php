@extends('layouts.layAdmin')

 @section('content')
 
<h1>All Information About the sellers</h1>
 

@foreach ($users as $user)
    
  @if($user->role==='seller')
    {
    <li> {{ $user}}  </li>
    }  
  @endif
@endforeach

@endsection
