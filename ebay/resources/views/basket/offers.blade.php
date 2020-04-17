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
                        <div style=" margin: 20px; border: 1px grey solid;  ">
                            <img style="width: 11vw; height: 7vw;" src="/storage/{{$offer->media_reference}}" alt="{{$offer->Title}}"/> 
                        </div>

                        <div style="margin: 20px; width: 100%;">
                            <h3>{{$offer->Title}}</h3>
                            <h6>{{$offer->Category}}</h6>
                            nom vendeur: {{$offer->seller_username}}
                            <p>Prix : <strong>{{$offer->price}}€</strong></p>
                        </div>
                        <div>
                            @if($id_item_temp==$offer->item_id)
                                @php
                                    $valid_button="disabled";
                                @endphp
                                <div>
                                    <img src="/storage/icons/warning.png" alt="Warning" style="width: 30px; height: 30px;">
                                    Vous ne pouvez pas proposer 2 offres pour un même article merci de bien corriger votre panier
                                </div>

                            @endif
                         
                            @if(($offer->price<$offer->Initial_Price && strpos($offer->offer_type, "immediat")!== false  )||( $offer->price<$offer->Initial_Price&& strpos($offer->offer_type, "enchere")!== false))
                                @php
                                    $valid_button="disabled";
                                @endphp
                                <div>
                                    <img src="/storage/icons/warning.png" alt="Warning" style="width: 30px; height: 30px;">
                                    Le prix actuel de l'article a évolué. Votre demande est inférieur, elle ne peut être accepter.
                                </div>
                            @endif

                            @if($offer->sold==1)
                                @php
                                    $valid_button="disabled";
                                @endphp
                                <div>
                                    <img src="/storage/icons/warning.png" alt="Warning" style="width: 30px; height: 30px;">
                                    Cet article est déjà vendu. Il faut être plus rapide ^^
                                </div>
                            @endif
                        </div>
                        <div>
                            <form action="panier/update/{{$offer->id}}" method="post">
                                {{ csrf_field() }}
                                <input type="submit" class="btn btn-lg btn-info"value="Modifier">
                            </form>
                            <form action="panier/delete/{{$offer->id}}" method="post">
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
        <form action="/purshase" method="post">
            {{ csrf_field() }}
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" >Valider le panier
            </button>
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <h2>Delivery choice</h2>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="choosenadress">Adress</label>
                        </div>
                        <select class="custom-select " name="choosenadress">
                         
                          <option selected>Choose...</option>
                          @foreach($delivery_addresses as $delivery_address)
                          <option value={{$delivery_address->id}}>{{$delivery_address->street}}</option>
                          @endforeach
                        </select>
                      </div>
                      <h2>Payment choice</h2>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="choosenPayment">Payment</label>
                        </div>
                        <select class="custom-select selectpicker"  name="choosenPayment">
                          <option selected>Choose...</option>
                          
                          @foreach($payment_infos as $payment_info)
                          <option  value={{$payment_info->id}}>{{$payment_info->cardType}}</option>
                          
                         @endforeach
                        
                        </select>
                      </div>
                      @foreach($payment_infos as $payment_info)
                    <div hidden class="input-group mb-3" id={{"coco".$payment_info->id}}>
                       <h3>Card informations</h3>
                    
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
                      <button type="submit" class="btn btn-success"value="Buy">Buy</button>
                    </div>
                  </div>
                </div>
              </div>
        </form>
    @else
        <p> Nous n'avons trouvé aucun article dans votre panier pour l'instant.
            <br> Allez faire vos achats ! </p>
    @endif
@endsection

