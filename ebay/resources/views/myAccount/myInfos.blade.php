@extends('layouts.layout')

@section('content')

<h1>Mes informations</h1>

@if($user->role!=='buyer')
        <img class="rounded-circle img-thumbnail" src="/storage/{{$user->profil_picture}}" style="position: absolute; top: 17vh;left: 13vw; height: 12vw; width:12vw;"alt="">
        <img src="/storage/{{$user->background_picture}}" style="height: 20vw; width:100%;"alt="">
@endif
        <table>
        <tr>
                <td>
                <p>Username: </p>
                </td>
                <td>
                <p>{{$user->username}}</p>
                </td>
        </tr>
        <tr>
                <td>
                <p>Prénom:</p>
                </td>
                <td>
                <p>{{$user->firstname}}</p>
                </td>
        </tr>
        <tr>
                <td>
                <p>NOM:</p>
                </td>
                <td>
                <p>{{$user->lastname}}</p>
                </td>
        </tr>
        <tr>
                <td>
                <p>role:</p>

        
                </td>
                <td>
                <p>{{$user->role}}</p>
                </td>
        </tr>
        <tr>
                <td>
                <p>email:</p>
                </td>
                <td>
                <p>{{$user->email}}</p>
                </td>
        </tr>
        @if($user->role!=='buyer')
        <tr>
                <td>
                <p>pseudo:</p>
                </td>
                <td>
                <p>{{$user->pseudo}}</p>
                </td>
        </tr>
        <tr>
                <td>
                <p>image de fond:</p>
                </td>
                <td>
                <p>{{$user->pseudo}}</p>
                </td>
        </tr>
        @endif

        </table>

        <a href="/myAccount/myInfos/edit"><button class="btn btn-lg btn-primary">Modifier</button></a>

@endsection

