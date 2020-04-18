@extends('layouts.layout')

@section('content')
    <h1>Mon Compte</h1>
    <br>
    <br>
    <a href="#"><button class="btn btn-lg btn-secondary">Informations Utilisateur</button></a>
    

    <!--spécifique à l'acheteur-->
    <div class="btn-group">
        <a href=/user/adress>
            <input class="btn btn-lg btn-secondary"  value="Mes Adresses de livraison">
        </a>
        <a href="/user/payments">
            <input class="btn btn-lg btn-secondary" value="Mes Options de paiement">
        </a>
        <a href="#"><input class="btn btn-lg btn-secondary" value="Mes Commandes"></a>
        <a href="#"><input class="btn btn-lg btn-secondary" value="Mes meilleurs offres en cours"></a>
        
    </div>
@endsection

