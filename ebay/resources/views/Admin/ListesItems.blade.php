@extends('layouts.layAdmin')

 @section('content')
 
<h1>All Information About the Items</h1>
 

@foreach ($items as $item)
    @if($item->admin_state==="approve")
    <li> {{ $item}}  </li>
    @endif
@endforeach
    
@endsection