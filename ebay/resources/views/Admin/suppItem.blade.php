
@extends('layouts.layAdmin')
<!--fichier inutile-->
@section('content')
  <h1>All Information About the items</h1>
  @foreach ($items as $item)
    <li> {{ $item}}  </li>
  @endforeach

  <form method="POST" action="/ListesItems/action">
    {{ csrf_field() }}
    <div>
      <div>
        <input type="number" name="num">
      </div>
      <input type="submit" value="Select name">
    </div>
  </form>  
@endsection