@extends('layouts.layout')

@section('content')
    
        <h1>Mes informations</h1>

    <form action="/myInfos/modification" method="post"class="uploader"  accept-charset="utf-8" enctype="multipart/form-data">
        {{ csrf_field() }}
        <table>
            <tr>
                <td><label>Username :</label></td>
                <td><input type="text"  name="user_username" value="{{$user->username}}"></td>
            </tr> 
            <tr> 
                <td><label >Firstname :</label></td>
                <td><input type="text"  name="user_firstname" value="{{$user->firstname}}"></td>
            </tr> 
            <tr> 
                <td><label >Lastname :</label></td>
                <td><input type="text"  name="user_lastname" value="{{$user->lastname}}"></td>
            </tr> 
            <tr> 
                <td><label >email :</label></td>
                <td><input type="email" name="user_email" value="{{$user->email}}"></td>
            </tr> 
            @if($user->role!=='buyer')
                <hr>
                <tr>  <td><br><strong>Mes données en tant que acheteur :</strong></td>
                </tr> 
                <tr> 
                    <td> <label >Pseudo :</label></td>
                    <td><input type="text" name="user_pseudo" value="{{$user->pseudo}}"></td>
                </tr> 
                <tr>
                    <td><label >Ajouter une photo de profil : </label></td>
                    <td>
                        @csrf
                        <input id="file-upload_profil" type="file" name="file_profil" accept="image/*" > 
                        <span class="text-danger">{{ $errors->first('fileUpload') }}</span>
                        <span id="erreurs"></span>
                    </td>
                </tr>
                <tr>
                    <td><label >Ajouter une photo de fond : </label></td>
                    <td>
                        @csrf
                        <input id="file-upload_background" type="file" name="file_backgroud" accept="image/*" > 
                        <span class="text-danger">{{ $errors->first('fileUpload') }}</span>
                        <span id="erreurs"></span>
                    </td>
                </tr>
            @endif
        </table>
        
         <br>
        <input type="submit" class="btn btn-lg btn-primary" value="Enregistrer les modifications">
</form>
     
@endsection

