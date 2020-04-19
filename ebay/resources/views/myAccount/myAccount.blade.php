@extends('layouts.layout')

@section('content')
    <h1>Mon Compte</h1>
    <br>
    <br>

    <a href="#"><button class="btn btn-lg btn-secondary">Informations Utilisateur</button></a>
    <div class="btn-group">

        @if($user->role==='buyer'||$user->role==='buyerseller')
            <!--spécifique à l'acheteur-->
            <a href=/user/adress>
                <button class="btn btn-lg btn-secondary"  value="Mes Adresses de livraison">Mes Adresses de livraison</button>
            </a>
                
            <a href="/user/payments">
                <button class="btn btn-lg btn-secondary" value="Mes Options de paiement">Mes Options de paiement</button>
            </a>
            <a href="/purshase"><button class="btn btn-lg btn-secondary" value="Mes Commandes">Mes Commandes</button></a>
            <a href="/mybestoffA"><button class="btn btn-lg btn-secondary" value="Mes meilleurs offres en cours">Mes meilleurs offres en cours</button></a>

        @endif
        @if($user->role==='seller'||$user->role==='buyerseller'||$user->role==='admin')
        <!--spécifique du vendeur-->
            <a href=/user/adress>
                <button class="btn btn-lg btn-secondary"  value="Mes Adresses de livraison">Historique de mes ventes</button>
            </a>
                
            <a href="/user/payments">
                <button class="btn btn-lg btn-secondary" value="Mes Options de paiement">Paramètres de sécurité</button>
            </a>

            <a href="/mybestoffV"><button class="btn btn-lg btn-secondary" value="Mes meilleurs offres en cours">Mes meilleurs offres en cours</button></a>
        @endif
    
    </div>
@endsection

