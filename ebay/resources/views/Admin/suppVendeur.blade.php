
@extends('layouts.layAdmin')
<!-- fichier inutile-->
@section('content')
  <h1>All Information About the sellers</h1>
  @foreach ($users as $user)

    @if($user->role==='seller')
      {
      <li> {{ $user}}  </li>
      }  
    @endif
  @endforeach
  @foreach ($users as $user)   
    @if($user->role==='seller')
      {
      <li> {{ $user->firstname}}  </li>
      }  
    @endif
  @endforeach 
      
            @foreach ($users as $user)   
            @if($user->role==='seller')
              {
              <li> {{ $user-> firstname}}  </li>
              }  
          
            @endif
          @endforeach
    
  
      <form method="POST" action="/ListesVendeurs/action">
  
          {{ csrf_field() }}

        
        <div>
      <div>
            <input type="number" name="num">
              </div>
              <input type="submit" value="Select name">
  
        </div>
  
      </form>  
@endsection