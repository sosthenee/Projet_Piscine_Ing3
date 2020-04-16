@extends('layouts.layout')

@section('content')
    <h1>All Information About Item</h1>
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

            

            <div class="right" style=" margin: 20px;  width: 30vw; height: 18vw;">
                <div class="carrousel" >
                    <!--width="500" height="300"-->
                    @foreach($items as $image)
                        <img  style="width: 30vw; height: 18vw; border: 1px grey solid; display: none;" src="/storage/{{$image->reference}}" alt="{{$image->Title}}" > 
                    @endforeach
                </div>
                
            </div>
        </div>

        <div style=" background: lightgrey;  margin: 20px 50px; padding: 20px;">
           
            @if(strpos($item->sell_type, "enchere")!== false)
                <form action="/achat/{{$item->item_id}}/addBidOffer" method="post">
                    {{ csrf_field() }}
                    <h4>Vente aux enchères</h4>
                    <p>Prix actuel : <strong>{{$item->Initial_Price}}€</strong>
                    <br>Date Début : {{$item->start_date}}
                    <br>Fin Début : {{$item->end_date}}
                    </p>
                    <h5>Enchère automatique :</h5>
                    Saissisez le montant maximum que vous etes prêt à dépenser: <input type="number" min="{{$item->Initial_Price}}" name="price" id="" placeholder="00€00">
                    <input type="submit" class="btn btn-primary" value="Encherire"></input>
                </form>
            @endif

            @if(strpos($item->sell_type, "bestoffer")!== false)
            
                <form action="/achat/{{$item->item_id}}/addBestOffer" method="post">
                    {{ csrf_field() }}
                    <h4>Vente au meilleur prix</h4>
                    <span> Proposez le prix que vous souhaitez au vendeur : </span>
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

