@extends('layouts.layout')

 

@section('content')
    <h1>All Information About Item</h1>
    <hr>
    
    <form action="/achat/SellType/search" method="get">
    {{ csrf_field() }} 
       <div class="row">
            <div class="form-group row col-sm-4">
                <label class="col-sm-5 col-form-label">Type de vente : </label> 
                <div class="col-sm-7">
                    <div class="form-check">
                        <input id="1" name="1" class="form-check-input" type="checkbox" checked>
                        <label class="form-check-label" for="1">Enchère</label>
                    </div>
                    <div class="form-check">
                        <input  id="2" name="2" class="form-check-input" type="checkbox" checked>
                        <label class="form-check-label" for="2">Meilleure Offre</label> 
                    </div>
                    <div class="form-check">
                        <input id="3" name="3" class="form-check-input"  type="checkbox" checked>
                        <label class="form-check-label" for="3">Achat Immédiat</label>
                    </div>
                </div>
            </div>
            <div class="form-group row col-sm-4">
                <label class="col-sm-5 col-form-label">Catégorie : </label> 
                <div class="col-sm-7">
                    <div class="form-check">
                        <input  id="a" name="a" class="form-check-input" type="checkbox" checked >
                        <label class="form-check-label" for="myCheckBid">Bon pour le Musée</label>
                    </div>
                    <div class="form-check">
                        <input  id="b" name="b" class="form-check-input" type="checkbox"checked >
                        <label class="form-check-label" for="myCheckBestOffer">Ferraille ou Trésor</label> 
                    </div>
                    <div class="form-check">
                        <input  id="c" name="c" class="form-check-input"  type="checkbox"checked >
                        <label class="form-check-label" for="myCheckImmediatPurchase">Accessoire VIP</label>
                    </div>
                </div>
            </div>
            <div class="form-group row col-sm-4">
                <div class="col-sm-4">
                    <label class="col-form-label">Prix min: </label>
                    <br> 
                    <label class="col-form-label">Prix max: </label> 
                </div>
                <div class="col-sm-7">
                    <div class="form-check">
                        <input  id="min_price"name="min_price" min=0 style="width: 100px;"class="form-check-input"  type="number" placeholder="1,00" >
                        <br><br>
                        
                    </div>
                    <div class="form-check">
                         <input id="max_price" name="max_price" min=0 style="width: 100px;" class="form-check-input"  type="number" placeholder="1000,00">
                         
                    </div>
                </div>
            </div>
            
            
        </div><input type="submit" class=" btn btn-lg btn-primary " value="Rechercher">
    </form>
    <hr>
    <h2>Enchères</h2>
    @if(count($items_bid)>0)
        @php
            $id_item_temp=-1;
        @endphp
        <div class="d-flex align-content-around flex-wrap">
            @foreach($items_bid as $item)
                @if($id_item_temp<>$item->item_id)
                    <div class="card" style="width: 21rem; margin: 10px;">
                        <img class="card-img-top" style="max-height: 40vh;"src="/storage/{{$item->reference}}" alt="Card image cap">
                        <div class="card-body d-flex  flex-column">
                            <div > 
                                <h3 style="display: inline;" class="card-title text-capitalize">{{$item->Title}}</h3>
                                <a class="linkseller" href="/achat/Seller/{{$item->user_id}}">de <label class="card-text" style="font-size: 1.2rem; color: #6610f2;"> {{$item->pseudo}}</label></a>
                                <h5 class="card-title">{{$item->Category}}</h5>
                                
                                <p class="card-text text-truncate" >{{$item->Description}}</p>
                            </div>
                           
                            <div class="mt-auto p-2 d-flex justify-content-between" style="border-top: thick double;" >
                                <div style="width: 100%;">
                                    @if(strpos($item->sell_type, "enchere")!== false)
                                        <h5>Vente aux enchères</h5>
                                           <label> Prix actuel : {{$item->Initial_Price}}€
                                        </label>
                                        <span class="countdown_end_date" hidden>{{$item->end_date}}</span>
                                        <span class="countdown"></span>
                                    @endif
                                    @if(strpos($item->sell_type, "bestoffer")!== false)
                                        <h5>Vente au meilleur prix</h5>
                                           <label>  Proposez le prix que vous souhaitez au vendeur !
                                        </label>
                                    @endif
                                    @if(strpos($item->sell_type, "immediat")!== false)
                                        <h5>Vente immediate</h5>
                                          <label>  Prix : {{$item->Initial_Price}}€
                                        </label>
                                    @endif
                                </div>
                                <div class="mt-auto " style="width: 150px;">
                                    <a href="/achat/{{$item->item_id}}" class="btn btn-primary">Voir cette objet</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php
                        $id_item_temp=$item->item_id;
                    @endphp
                    
                @endif

            @endforeach
        </div>
    @else
        <p> Nous n'avons trouvé aucun article disponible dans cette catégorie pour l'instant.
            <br> Nous vous invitons à revenir plus tard. </p>
    @endif

    <hr>
    <h2>Meilleurs Offres</h2>
    @if(count($items_bestoffer)>0)
        @php
            $id_item_temp=-1;
        @endphp
        <div class="d-flex align-content-around flex-wrap">
            @foreach($items_bestoffer as $item)
                @if($id_item_temp<>$item->item_id)
                    <div class="card" style="width: 21rem; margin: 10px;">
                        <img class="card-img-top" style="max-height: 40vh;"src="/storage/{{$item->reference}}" alt="Card image cap">
                        <div class="card-body d-flex  flex-column">
                            <div > 
                                <h3 style="display: inline;" class="card-title text-capitalize">{{$item->Title}}</h3>
                                <a class="linkseller" href="/achat/Seller/{{$item->user_id}}">de <label class="card-text" style="font-size: 1.2rem; color: #6610f2;"> {{$item->pseudo}}</label></a>
                                <h5 class="card-title">{{$item->Category}}</h5>
                                
                                <p class="card-text text-truncate" >{{$item->Description}}</p>
                            </div>
                           
                            <div class="mt-auto p-2 d-flex justify-content-between" style="border-top: thick double;" >
                                <div style="width: 100%;">
                                    @if(strpos($item->sell_type, "enchere")!== false)
                                        <h5>Vente aux enchères</h5>
                                           <label> Prix actuel : {{$item->Initial_Price}}€
                                        </label>
                                    @endif
                                    @if(strpos($item->sell_type, "bestoffer")!== false)
                                        <h5>Vente au meilleur prix</h5>
                                           <label>  Proposez le prix que vous souhaitez au vendeur !
                                        </label>
                                    @endif
                                    @if(strpos($item->sell_type, "immediat")!== false)
                                        <h5>Vente immediate</h5>
                                          <label>  Prix : {{$item->Initial_Price}}€
                                        </label>
                                    @endif
                                </div>
                                <div class="mt-auto " style="width: 150px;">
                                    <a href="/achat/{{$item->item_id}}" class="btn btn-primary">Voir cette objet</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php
                        $id_item_temp=$item->item_id;
                    @endphp
                    
                @endif

            @endforeach
        </div>
    @else
        <p> Nous n'avons trouvé aucun article disponible dans cette catégorie pour l'instant.
            <br> Nous vous invitons à revenir plus tard. </p>
    @endif
    <hr>
    <h2>Achat Immédiat</h2>
    @if(count($items_immediat)>0)
        @php
            $id_item_temp=-1;
        @endphp
        <div class="d-flex align-content-around flex-wrap">
            @foreach($items_immediat as $item)
                @if($id_item_temp<>$item->item_id)
                    <div class="card" style="width: 21rem; margin: 10px;">
                        <img class="card-img-top" style="max-height: 40vh;"src="/storage/{{$item->reference}}" alt="Card image cap">
                        <div class="card-body d-flex  flex-column">
                            <div > 
                                <h3 style="display: inline;" class="card-title text-capitalize">{{$item->Title}}</h3>
                                <a class="linkseller" href="/achat/Seller/{{$item->user_id}}">de <label class="card-text" style="font-size: 1.2rem; color: #6610f2;"> {{$item->pseudo}}</label></a>
                                <h5 class="card-title">{{$item->Category}}</h5>
                                
                                <p class="card-text text-truncate" >{{$item->Description}}</p>
                            </div>
                           
                            <div class="mt-auto p-2 d-flex justify-content-between" style="border-top: thick double;" >
                                <div style="width: 100%;">
                                    @if(strpos($item->sell_type, "enchere")!== false)
                                        <h5>Vente aux enchères</h5>
                                           <label> Prix actuel : {{$item->Initial_Price}}€
                                        </label>
                                    @endif
                                    @if(strpos($item->sell_type, "bestoffer")!== false)
                                        <h5>Vente au meilleur prix</h5>
                                           <label>  Proposez le prix que vous souhaitez au vendeur !
                                        </label>
                                    @endif
                                    @if(strpos($item->sell_type, "immediat")!== false)
                                        <h5>Vente immediate</h5>
                                          <label>  Prix : {{$item->Initial_Price}}€
                                        </label>
                                    @endif
                                </div>
                                <div class="mt-auto " style="width: 150px;">
                                    <a href="/achat/{{$item->item_id}}" class="btn btn-primary">Voir cette objet</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php
                        $id_item_temp=$item->item_id;
                    @endphp
                    
                @endif

            @endforeach
        </div>
    @else
        <p> Nous n'avons trouvé aucun article disponible dans cette catégorie pour l'instant.
            <br> Nous vous invitons à revenir plus tard. </p>
    @endif
@endsection

