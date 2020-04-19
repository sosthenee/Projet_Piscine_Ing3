@extends('layouts.layout')

@section('content')
<div class="card border-primary mb-3" style="max-width: 18rem;" >
        <h3 class="card-header">Mes informations</h3>
        <div class="card-body"> 
              
        <p><strong>Username: </strong>{{$user->username}}</p>
        <p><strong>firstname: </strong>{{$user->firstname}}</p>
        <p><strong>lastname: </strong>{{$user->lastname}}</p>
        <p><strong>role: </strong>{{$user->role}}</p>
        <p><strong>email: </strong>{{$user->email}}</p>
        
        
           @if($user->role!=='buyer')
        <p>pseudo:{{$user->pseudo}}</p>
        <p>image de fond:{{$user->pseudo}}</p>
        @endif

        <a href="/myAccount/myInfos/edit"><button class="btn btn-outline-primary">Modifier</button></a>
    
        </div>
</div>
@endsection

