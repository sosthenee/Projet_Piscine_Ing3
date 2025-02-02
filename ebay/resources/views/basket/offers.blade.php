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
        <h5 class="modal-title" style="float: right; margin-bottom: 20px; margin-right: 50px;"id="exampleModalLongTitle">Total du panier : {{$data->first()->count}} €</h5>
        <form action="/purshase" method="post"  style="padding: 10px; margin: 30px 50px;">
            {{ csrf_field() }}
            <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#exampleModalCenter" {{$valid_button}}>Valider le panier
            </button>
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Total du panier : {{$data->first()->count}} €</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h2>Delivery choice</h2>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="choosenadress">Adresse </label>
                                </div>
                                <select class="custom-select " name="choosenadress" required>
                                    <option selected value="">Choose...</option>
                                    @foreach($delivery_addresses as $delivery_address)
                                        <option value={{$delivery_address->id}}>{{$delivery_address->street}}</option>
                                    @endforeach
                                </select>
                                <a href="/user/adress">
                                    <button type="button"  class="btn btn-outline-primary"><i class="fa fa-plus"></i>
                                </a>
                            </div>
                            <h2>Payment choice</h2>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="choosenPayment">Paiement</label>
                                </div>
                                <select class="custom-select selectpicker"  name="choosenPayment" required>
                                    <option selected value="">Choose...</option>
                                    @foreach($payment_infos as $payment_info)
                                        <option  value={{$payment_info->id}}>{{$payment_info->cardType}}</option>
                                    @endforeach
                                </select>
                                <a href="/user/payments">
                                    <button type="button"  class="btn btn-outline-primary"><i class="fa fa-plus"></i>
                                </a>
                            </div>
                            @foreach($payment_infos as $payment_info)
                                <div hidden class="input-group mb-3" id={{"coco".$payment_info->id}}>
                                    <h3>Informations Cartes</h3>
                                    <div class="container">
                                        <ul> 
                                            <li>{{$payment_info->cardType}}</li>
                                            <li>{{$payment_info->cardNumber}}</li>
                                            <li>{{$payment_info->cardName}}</li>                      
                                            <li>{{$payment_info->expirationDate}}</li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    <div class="modal-footer">
                        <h5 class="modal-title">Basket total : {{$data->first()->count}} €</h5>
                        <button type="submit" class="btn btn-success"value="Buy">Buy</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @else
        <p> Nous n'avons trouvé aucun article dans votre panier pour l'instant.
            <br> Allez faire vos achats ! 
        </p>
    @endif
@endsection

