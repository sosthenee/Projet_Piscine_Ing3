@extends('layouts.layout')

@section('content')
    
        <h1>Mes informations</h1>

    <form action="/myInfos/modification" method="post">
        {{ csrf_field() }}
    <div>
        <label>Username :</label>
        <input type="text"  name="user_username" value="{{$user->username}}">
    </div>
    <div>
            <label >Firstname :</label>
        <input type="text"  name="user_firstname" value="{{$user->firstname}}">
    </div>
    <div>
            <label >Lastname :</label>
        <input type="text"  name="user_lastname" value="{{$user->lastname}}">
    </div>
    <div>
            <label >email :</label>
        <input type="email" name="user_email" value="{{$user->email}}">
    </div>
         @if($user->role!=='buyer')
    <div>
            <label >Pseudo :</label>
        <input type="text" name="user_pseudo" value="{{$user->pseudo}}">
    </div>
         @endif
        <input type="submit" class="btn btn-primary" value="Enregistrer les modifications">
</form>
     
@endsection

