@extends('layouts.layAdmin')

 @section('content')
 
<h1>All Information About the sellers</h1>
 

@foreach ($users as $user)
    
  @if($user->role==='askseller')
    {
    <li> {{ $user}}  </li>
    <form method="POST" action="/VendeursAttente/approuver/{{$user->id}}">
        {{ csrf_field() }}  
         <button style="danger" type="submit">APPROUVER</button>
         </form>
     <form method="POST" action="/VendeursAttente/refuser/{{$user->id}}">
        {{ csrf_field() }}  
         <button style="danger" type="submit">REFUSER</button>
         </form>
    }  
  @endif
@endforeach

    
@endsection





