@extends('layouts.layout')

@section('content')
    <h1>Mon Compte</h1>
    <br>
    <br>

    <a href="/myAccount/myInfos"><button class="btn btn-outline-primary">Informations Utilisateur</button></a> <br>
    <div >

        @if($user->role==='buyer'||$user->role==='buyerseller')
            <!--spécifique à l'acheteur-->
            <br>
            <a href=/user/adress>
                <button class="btn btn-outline-primary"  value="Mes Adresses de livraison">Mes Adresses de livraison</button>
            </a>
            <br>   
            <a href="/user/payments">
                <br> <button class="btn btn-outline-primary" value="Mes Options de paiement">Mes Options de paiement</button>
            </a>
            <br> <br> <a href="/purshase"><button class="btn btn-outline-primary" value="Mes Commandes">Mes Commandes</button></a>
            
            <br> <br> <a href="/mybestoffA"><button class="btn btn-outline-primary"  value="Mes meilleurs offres en cours">Mes meilleurs offres en cours</button></a>

        @endif
        @if($user->role==='seller'||$user->role==='buyerseller'||$user->role==='admin')
        <!--spécifique du vendeur-->
            <a href=/user/adress>
                <br> <button class="btn btn-outline-primary"   value="Mes Adresses de livraison">Historique de mes ventes</button>
            </a>
                
            <br> <br> <a href="/user/payments">
                <button class="btn btn-outline-primary"  value="Mes Options de paiement">Paramètres de sécurité</button>
            </a>

            <br> <br> <a href="/mybestoffV"><button class="btn btn-outline-primary"  value="Mes meilleurs offres en cours">Mes meilleurs offres en cours</button></a>
        @endif
    
    </div>
@endsection

