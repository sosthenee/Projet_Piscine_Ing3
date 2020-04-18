@extends('layouts.layout')

 

@section('content')
    <h1>All Information About Item</h1>
    
    @if(count($items)>0)
        @php
            $id_item_temp=-1;
        @endphp
        <div class="d-flex align-content-around flex-wrap">
            @foreach($items as $item)
                @if($id_item_temp<>$item->item_id)
                    <div class="card" style="width: 21rem; margin: 10px;">
                        <img class="card-img-top" style="max-height: 40vh;"src="/storage/{{$item->reference}}" alt="Card image cap">
                        <div class="card-body d-flex  flex-column">
                            <div > 
                                <h3 style="display: inline;" class="card-title text-capitalize">{{$item->Title}}</h3>
                                <label class="card-text"> {{$item->username}}</label>
                                <h5 class="card-title">{{$item->Category}}</h5>
                                
                                <p class="card-text text-truncate" >{{$item->Description}}</p>
                            </div>
                           

                            <div class="mt-auto p-2 d-flex justify-content-between" style="border-top: thick double;" >
                            
                                <div style="width: 100%;">

                                    @if(strpos($item->sell_type, "enchere")!== false)
                                        <h5>Vente aux enchères</h5>
                                        <label> Prix actuel : {{$item->Initial_Price}}€</label>
                                        <br>
                                        <span class="countdown_end_date" hidden>{{$item->end_date}}</span>
                                        <span class="countdown"></span>
                                    @endif
                                    @if(strpos($item->sell_type, "bestoffer")!== false)
                                        <h5>Vente au meilleur prix</h5>
                                        <label>  Proposez le prix que vous souhaitez au vendeur !</label>
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
                    <!--<a href="/achat/{{$item->item_id}}"  >
                        <div class="well" style="display: flex; border: 1px grey solid; padding: 10px; margin: 50px;">
                            <div style="margin: 20px; width: 100%;">
                                <h3>{{$item->Title}}</h3>
                                
                                <h5>{{$item->Category}}</h5>
                                <p>Nom vendeur: {{$item->username}}</p>
                                <p>{{$item->Description}}</p>
                            </div>

                            <div style="width: 300px; background: lightgrey;  margin: 20px;">
                                <p>Disponible : </p>
                                @if(strpos($item->sell_type, "enchere")!== false)
                                    <p>Vente aux enchères
                                        <br>Prix actuel : {{$item->Initial_Price}}€
                                    </p>
                                @endif
                                @if(strpos($item->sell_type, "bestoffer")!== false)
                                    <p>Vente au meilleur prix
                                        <br> Proposez le prix que vous souhaitez au vendeur !
                                    </p>
                                @endif
                                @if(strpos($item->sell_type, "immediat")!== false)
                                    <p>Vente immediate
                                        <br> Prix : {{$item->Initial_Price}}€
                                    </p>
                                @endif
                            </div>

                            <div style=" margin: 20px; border: 1px grey solid; ">
                                <img style="width: 18vw; height: 13vw;" src="/storage/{{$item->reference}}" alt="{{$item->Title}}"> 
                            </div>
                        </div>
                    </a>-->
                @endif

            @endforeach
        </div>
    @else
        <p> Nous n'avons trouvé aucun article disponible pour l'instant.
            <br> Nous vous invitons à revenir plus tard. </p>
    @endif
@endsection

