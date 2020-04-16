@extends('layouts.layout')


@section('content')
    <h1>Mon Panier :</h1>
    @if(count($offers)>0)

        <form action="/panier/delivery/" method="post"></form>
            @php
                $id_offer_temp=-1;
            @endphp
            @foreach($offers as $offer)

                @if($id_offer_temp<>$offer->id)
                    @php
                        $id_offer_temp=$offer->id;
                    @endphp
                    <div class="well" style="display: flex; border: 1px grey solid; padding: 10px; margin: 20px 50px;">
                        <div style=" margin: 20px; border: 1px grey solid;  ">
                            <img style="width: 11vw; height: 7vw;" src="/storage/{{$offer->reference}}" alt="{{$offer->Title}}"> 
                        </div>

                        <div style="margin: 20px; width: 100%;">
                            <h3>{{$offer->Title}}</h3>
                            <h6>{{$offer->Category}}</h5>
                            nom vendeur: {{$offer->username}}
                            <p>Prix : <strong>{{$offer->price}}€</strong></p>
                        </div>
                        <div >
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
            
            @endforeach
            {{ csrf_field() }}
            <input type="submit" class="btn btn-success"value="Valider le panier">
        </form>
    @else
        <p> Nous n'avons trouvé aucun article dans votre panier pour l'instant.
            <br> Allez faire vos achats ! </p>
    @endif
@endsection

