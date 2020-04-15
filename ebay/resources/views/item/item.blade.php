@extends('layouts.app')

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
                            <img  style="width: 40vw; height: 25vw; display: none;" src="../storage/{{$image->reference}}" alt="{{$image->Title}}" > 
                        @endforeach
                    </div>
                    
                </div>
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
               

            
        
    @else
        <p> Nous n'avons trouvé aucun article correspondant.
            <br> Nous vous invitons à revenir plus tard. 
        </p>
    @endif
@endsection

