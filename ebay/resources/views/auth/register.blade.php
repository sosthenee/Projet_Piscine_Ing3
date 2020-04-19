@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username') 
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('Firstname') }}</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>

                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Lastname') }}</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label  class="col-md-4 col-form-label text-md-right">You are a :</label>
                            
                            <div style="padding-top: 8px; margin-left: 16px;" >
                                
                                <input id="buyer"  value="rolebuyer" name="rolebuyer" type="checkbox"  > Buyer
                                <input id="Seller"  value="roleseller" name="roleseller" type="checkbox" > Seller
                               
                            </div>
                        </div>
                        
                        <div id="sellercontent" style="display: none;">
                          <hr>
                          <h4> Veuillez completer les champs ci dessous:</h4>
                            <table>
                                <div class="form-group row">
                                    <label for="pseudo" class="col-md-4 col-form-label text-md-right">{{ __('Pseudo') }}</label>

                                    <div class="col-md-6">
                                        <input id="pseudo" type="text" class="form-control @error('pseudo') is-invalid @enderror" name="pseudo" value="{{ old('pseudo') }}" autocomplete="pseudo" autofocus>

                                        @error('pseudo') 
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            
                                <!--<tr>
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
                                </tr>-->
                            </table>
                        </div>
                        <div id="buyercontent" style="display: none;">
                            <hr>
                            <h3> Veuillez signer le contrat des règles d'achat:</h3><br>
                            
                            <div class="form-group row">
                              <label for="contrat" class="col-md-4 col-form-label text-md-right">{{ __('Contrat :') }}</label>
                                   
                              <div class="col-md-6">
                                  <input id="contrat" type="checkbox" class="form-control " name="contrat"    >
                                
                              </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button id="button_register" type="submit" class="btn btn-primary" disabled>
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
