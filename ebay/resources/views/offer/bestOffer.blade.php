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
            <div class="right" style=" margin: 20px;">
                <div class="carrousel" >
                    @foreach($items as $image)
                        @if($image->media_type=="picture")
                            <img  style="width: 30vw; height: 18vw; border: 1px grey solid; display: none;" src="/storage/{{$image->media_reference}}" alt="{{$image->Title}}" > 
                        @endif
                    @endforeach
                </div> 
                @foreach($items as $image)
                     @if($image->media_type=="video")
                        <video controls style="width: 30vw; height: 18vw; border: 1px grey solid;"  >
                            <source src="/storage/{{$image->reference}}">
                            </source>
                            votre navigateur ne prend pas en charge ce type de vidéo
                        </video>
                    @endif
                @endforeach
            </div>
        </div>

        <div style=" background: lightgrey;  margin: 20px 50px; padding: 20px;">
           
           

            @if(strpos($item->sell_type, "bestoffer")!== false)
          
                    <form action="/mybestoff/{{$item->item_id}}/addBestOffer" method="post">
                        {{ csrf_field() }}
                        <h4>Vente au meilleur prix</h4>
                         @if($item->price!==NULL)

                        <p>Une personne évalue cette article à: {{$item->price}} €             <input type="submit" class="btn btn-primary" value="Accepter l'offre"></p>
                        @endif
                    </form>
                     <form action="/mybestoff/{{$item->item_id}}" method="post">  
                         {{ csrf_field() }}
                         <input type="number" name="idduuser" id="" value="{{$item->user_id}}" hidden>
                         <input type="number" name="iddepreoffre" id="" value="{{$item->id}}" hidden>
                        <span> Proposez le prix que vous souhaitez au vendeur : </span>
                        <input type="number" name="price" id="" placeholder="00€00">
                        <input type="submit" class="btn btn-primary" value="Faire une proposition">
                    </form>
                
            @endif
        </div>
 
    @else
        <p> Nous n'avons trouvé aucun article correspondant.
            <br> Nous vous invitons à revenir plus tard. 
        </p>
    @endif

@endsection

