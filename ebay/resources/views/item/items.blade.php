@extends('layouts.app')

 

@section('content')
    <h1>All Information About Item</h1>
    @if(count($items)>0)
        @php
            $id_item_temp=-1;
        @endphp
        @foreach($items as $item)
            @if($id_item_temp<>$item->item_id)
                <a href="{{$item->item_id}}"  >
                    <div class="well" style="display: flex; border: 1px grey solid; padding: 10px; margin: 50px;">
                        <div style="margin: 20px; width: 100%;">
                            <h3>{{$item->Title}}</h3>
                            @php
                                $id_item_temp=$item->item_id;
                            @endphp
                            <h5>{{$item->Category}}</h5>
                            <p>nom vendeur: {{$item->username}}</p>
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

                        <div style=" margin: 20px; border: 1px grey solid; width: 20vw;">
                            <img style="width: 100%; height: 100%; "src="/storage/{{$item->reference}}" alt="{{$item->Title}}"> 
                        </div>
                    </div>
                </a>
            @endif

            
        @endforeach
    @else
        <p> Nous n'avons trouvé aucun article disponible pour l'instant.
            <br> Nous vous invitons à revenir plus tard. </p>
    @endif
@endsection

