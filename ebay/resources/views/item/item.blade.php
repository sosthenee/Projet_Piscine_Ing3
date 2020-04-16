@extends('layouts.layout')

@section('content')
    <h1>All Information About Item</h1>
    @if(count($items)>0)
        
        @php
            $item=$items[0];
        @endphp
        <div class="well" style="display: flex; border: 1px grey solid; padding: 10px; margin: 50px;">
            <div style="margin: 20px; width: 100%;">
                <h3>{{$item->Title}}</h3>
                
                <h5>{{$item->Category}}</h5>
                <p>nom vendeur: {{$item->username}}</p>
                <p>{{$item->Description}}</p>
            </div>

            

            <div class="right" style=" margin: 20px; border: 1px grey solid; width: 60vh; height: 25vw;">
                <div class="carrousel" >
                    <!--width="500" height="300"-->
                    @foreach($items as $image)
                        <img  style="width: 40vw; height: 25vw; display: none;" src="/storage/{{$image->reference}}" alt="{{$image->Title}}" > 
                    @endforeach
                </div>
                
            </div>
        </div>

        <div style=" background: lightgrey;  margin: 20px;">
            <p>Disponible : </p>
            @if(strpos($item->sell_type, "enchere")!== false)
                <h4>Vente aux enchères</h4>
                <p>Prix actuel : {{$item->Initial_Price}}€
                <br> Date Début : {{$item->start_date}}
                <br> Fin Début : {{$item->end_date}}
                </p>
                <p>Enchère automatique :</p>
                Saissisez le montant maximum que vous etes pret à dépenser: <input type="text" name="price" id="" placeholder="00€00">
                <button class="btn btn-primary">Encherire</button>
            @endif
            @if(strpos($item->sell_type, "bestoffer")!== false)
                <h4>Vente au meilleur prix</h4>
                <p> Proposez le prix que vous souhaitez au vendeur !</p>
                <input type="text" name="price" id="" placeholder="00€00">
                <button class="btn btn-primary">Faire une proposition</button>
            @endif
            @if(strpos($item->sell_type, "immediat")!== false)
                <h4>Vente immediate</h4>
                <p> Prix : {{$item->Initial_Price}}€ </p>
                <button class="btn btn-primary">Achat immediat</button>
            @endif
        </div>
               

            
        
    @else
        <p> Nous n'avons trouvé aucun article correspondant.
            <br> Nous vous invitons à revenir plus tard. 
        </p>
    @endif
@endsection

