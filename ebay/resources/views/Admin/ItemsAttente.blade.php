@extends('layouts.layAdmin')

 @section('content')

<h1>All the Items not approved</h1>
 

         
         
@foreach ($items as $item)
    @if($item->admin_state==="not") 
    <li> {{ $item}}  </li>
    @endif
@endforeach
    
    
@endsection