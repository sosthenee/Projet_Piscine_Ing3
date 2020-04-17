@extends('layouts.layout')


@section('content')
    <h1>Mon Panier :</h1>
    @if(count($offers)>0)

       
            @php
                $id_offer_temp=-1;
                $id_item_temp=-1;
                $valid_button="";

            @endphp
            @foreach($offers as $offer)

                @if($id_offer_temp<>$offer->id)
                    
                    <div class="well" style="display: flex; border: 1px grey solid; padding: 10px; margin: 20px 50px;">
                        
                        
                        <img class="img-thumbnail rounded float-left" style="width: 15vw; height: 10vw; margin: 20px;" src="/storage/{{$offer->media_reference}}" alt="{{$offer->Title}}"/> 
                    
                        
                        <div style="margin: 20px; width: 100%;">
                            <h3>{{$offer->Title}}</h3>
                            <h6>{{$offer->Category}}</h6>
                            nom vendeur: {{$offer->seller_username}}
                            <p>Prix : <strong>{{$offer->price}}€</strong></p>
                        </div>
                        <div class="right">
                            @if($id_item_temp==$offer->item_id)
                                @php
                                    $valid_button="disabled";
                                @endphp
                                <div class="alert alert-danger"  role="alert">
                                    <img src="/storage/icons/warning.png" alt="Warning" style="width: 30px; height: 30px;">
                                    Vous ne pouvez pas proposer 2 offres pour un même article merci de corriger votre panier
                                </div>

                            @endif
                        
                            @if(($offer->price<$offer->Initial_Price && strpos($offer->offer_type, "immediat")!== false  )||( $offer->price<$offer->Initial_Price&& strpos($offer->offer_type, "enchere")!== false))
                                @php
                                    $valid_button="disabled";
                                @endphp
                                <div class="alert alert-danger"  role="alert">
                                    <img src="/storage/icons/warning.png" alt="Warning" style="width: 30px; height: 30px;">
                                    Le prix actuel de l'article a évolué. Votre demande est inférieur, elle ne peut être accepter.
                                </div>
                            @endif

                            @if($offer->sold==1)
                                @php
                                    $valid_button="disabled";
                                @endphp
                                <div class="alert alert-danger"  role="alert">
                                    <img src="/storage/icons/warning.png" alt="Warning" style="width: 30px; height: 30px;">
                                    Cet article est déjà vendu. Il faut être plus rapide ^^ <br> Merci de modifier votre panier en conséquence
                                </div>
                            @endif
                        </div>
                        
                        <div class=" align-self-center">
                            <form action="panier/update/{{$offer->id}}"class="d-flex justify-content-center" style="margin: 20px 20px;"method="post">
                                {{ csrf_field() }}
                                <input type="submit" class="btn btn-lg btn-info"value="Modifier">
                            </form>
                            <form action="panier/delete/{{$offer->id}}" class="d-flex justify-content-center" style="margin: 20px 20px;" method="post">
                                {{ csrf_field() }}
                                <input type="submit" class="btn btn-lg btn-danger"value="Supprimer">
                            </form>
                        </div> 
                    </div>
                @endif
                @php
                    $id_offer_temp=$offer->id;
                    $id_item_temp=$offer->item_id;
                @endphp
            @endforeach
        <form action="/panier/delivery" method="post" style="padding: 10px; margin: 20px 50px;">
            {{ csrf_field() }}
            <input type="submit" class="btn btn-success btn-lg btn-block"value="Valider le panier" {{$valid_button}}>
        </form>
    @else
        <p> Nous n'avons trouvé aucun article dans votre panier pour l'instant.
            <br> Allez faire vos achats ! </p>
    @endif
@endsection

