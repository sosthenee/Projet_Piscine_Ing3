@extends('layouts.layAdmin')

@section('content')
    <br><br><br>
    <h1>.</h1>
    <!-- fichier inutile-->
            
    @foreach ($items as $item)
        @if($item->admin_state==="not") 
            <li> {{$item}}  </li>
        @endif
    @endforeach

@endsection