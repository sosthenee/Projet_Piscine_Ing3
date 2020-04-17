@extends('layouts.layAdmin')

 @section('content')
<h1>All the Items not approved</h1>
 
 
         
         
@foreach ($items as $item)
    @if($item->admin_state==="waiting")

    <li> {{ $item}}  </li>
    
     <form method="POST" action="/ItemsAttente/approuver/{{$item->id}}">
        {{ csrf_field() }}  
         <button style="danger" type="submit">APPROUVER</button>
         </form>
     <form method="POST" action="/ItemsAttente/refuser/{{$item->id}}">
        {{ csrf_field() }}  
         <button style="danger" type="submit">REFUSER</button>
         </form>
    @endif
@endforeach
    
@endsection
