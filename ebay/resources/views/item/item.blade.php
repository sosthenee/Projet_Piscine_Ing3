@extends('layouts.layout')

@section('content')
    <h1>Toutes les informations de cet item</h1>
    @if(count($items)>0)
        
        @php
            $item=$items[0];
        @endphp
        <div class="well" style="display: flex; border: 1px grey solid;padding: 10px; margin: 50px; ">
            <div style="margin: 20px; width: 100%;">
                <h3>{{$item->Title}}</h3>
                
                <h5>{{$item->Category}}</h5>
                <p>nom vendeur: {{$item->username}}</p>
                <p>{{$item->Description}}</p>
            </div>
            <div class="right" style=" margin: 20px;">

                <div id="carouselControls" class="carousel slide" data-ride="carousel" style="border: 1px solid;">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselControls" data-slide-to="0" class="active"></li>
                        @for($i=1; $i < count($items); $i++)
                            <li data-target="#carouselControls" data-slide-to=$i></li>
                        @endfor
                    </ol>
                    <div class="carousel-inner ">
                        <div class= "carousel-item active" >
                            @if($items[0]->type=="picture")
                                <img  class="d-inline-block " style="width: 30vw; height: 18vw; " src="/storage/{{$items[0]->reference}}" alt="{{$items[0]->Title}}" > 
                            @endif
                            @if($items[0]->type=="video")
                                <video controls  style="width: 30vw; height: 18vw; " >
                                    <source src="/storage/{{$items[0]->reference}}">
                                    </source>
                                    votre navigateur ne prend pas en charge ce type de vidéo
                                </video>
                            @endif
                        </div>
                        @for($i=1; $i < count($items); $i++)
                            <div class= "carousel-item">
                                @if($items[$i]->type=="picture")
                                    <img  class="d-inline-block " style="width: 30vw; height: 18vw; "  src="/storage/{{$items[$i]->reference}}" alt="{{$items[$i]->Title}}" > 
                                @endif
                                @if($items[$i]->type=="video")
                                    <video controls style="width: 30vw; height: 18vw; "  >
                                        <source src="/storage/{{$items[$i]->reference}}">
                                        </source>
                                        votre navigateur ne prend pas en charge ce type de vidéo
                                    </video>
                                @endif
                            </div>
                        @endfor
                    </div>
                    <a class="carousel-control-prev" href="#carouselControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div> 
               
            </div>
        </div>

        <div style=" background: lightgrey;  margin: 20px 50px; padding: 20px;">
           
            @if(strpos($item->sell_type, "enchere")!== false)
                <form action="/achat/{{$item->item_id}}/addBidOffer" method="post">
                    {{ csrf_field() }}
                    <h4>Vente aux enchères</h4>
                    <p>Prix actuel : <strong>{{$item->Initial_Price}}€</strong>
                    <br>Date Début : {{substr($item->start_date,0,10)}}
                    <br>Fin Début : {{substr($item->end_date,0,10)}}
                    <span class="countdown_end_date" hidden>{{$item->end_date}}</span>
                    <br>
                    <span class="countdown" style="font-weight: bold;"></span>
                    </p>
                    <h5>Enchère automatique :</h5>
                    @php
                        $minimum_price=$item->Initial_Price+1;
                    @endphp
                    Saississez le montant maximum que vous êtes prêt à dépenser: <input type="number" min="{{$minimum_price}}" name="price" id="" placeholder="00€00">
                    <input type="submit" class="btn btn-primary" value="Encherir">
                </form>
            @endif

            @if(strpos($item->sell_type, "bestoffer")!== false)
            
                <form action="/achat/{{$item->item_id}}/addBestOffer" method="post">
                    {{ csrf_field() }}
                    <h4>Vente au meilleur prix</h4>
                    
                    <span> Proposez le prix que vous souhaitez, au vendeur : </span>
                    <input type="number" name="price" id="" placeholder="00€00">
                    <input type="submit" class="btn btn-primary" value="Faire une proposition">
                </form>
                
            @endif

            @if(strpos($item->sell_type, "immediat")!== false)
            
                <form action="/achat/{{$item->item_id}}/addImmediatOffer" method="post">
                    {{ csrf_field() }}
                    <h4>Vente immediate</h4>
                    <span> Prix : {{$item->Initial_Price}}€ </span>
                    <input type="submit" class="btn btn-primary" value="Ajouter à mon panier">
                </form>
            @endif
        </div>
 
    @else
        <p> Nous n'avons trouvé aucun article correspondant.
            <br> Nous vous invitons à revenir plus tard. 
        </p>
    @endif

@endsection

