@extends('layouts.layout')

@section('content')
    
        <h1>Mes informations</h1>
        <p>Username: {{$user->username}}</p>
        <p>firstname:{{$user->firstname}}</p>
        <p>lastname:{{$user->lastname}}</p>
        <p>role:{{$user->role}}</p>
        <p>email:{{$user->email}}</p>
        
        
           @if($user->role!=='buyer')
        <p>pseudo:{{$user->pseudo}}</p>
        <p>image de fond:{{$user->pseudo}}</p>
        @endif
        
        <a href="/myAccount/myInfos/edit"><button class="btn btn-lg btn-secondary">Modifier</button></a>
    
     
@endsection

