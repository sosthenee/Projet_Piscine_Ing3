@extends('layouts.layout')

 

@section('content')
    <h1>Mes items</h1>
    

    <form action="/vendre/add" method="get">
        <input type="submit" value="AJOUTER UN ITEM" class="btn btn-lg btn-primary">
    </form>
    <br>
    <form action="" method="get">
        <input type="submit" value="VOIR LES DEMANDES DE MEILLEURS OFFRES" class="btn btn-lg btn-primary">
    </form>
    <hr>
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
                                <h5 class="card-title">{{$item->Category}}</h5>
                                
                                <p class="card-text text-truncate" >{{$item->Description}}</p>
                                <p class="card-text">Admin state: {{$item->admin_state}}</p>
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
                                        <label>  </label>
                                    @endif
                                    @if(strpos($item->sell_type, "immediat")!== false)
                                        <h5>Vente immediate</h5>
                                          <label>  Prix actuel: {{$item->Initial_Price}}€
                                        </label>
                                    @endif
                                </div>
                                <div class="mt-auto " style="width: 150px;">
                                    @if($item->sold==true)
                                        <label>VENDU</label>
                                    @endif
                                    @if($item->sold==false)
                                        <label>En cours de vente</label>
                                    @endif
                                    <!--<a href="/achat/{{$item->item_id}}" class="btn btn-primary">Voir cette objet</a>-->
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
        <p> Nous n'avons trouvé aucun article disponible pour l'instant.
            <br> Nous vous invitons à revenir plus tard. </p>
    @endif
@endsection

