@extends('layouts.layout')


@section('content')
    <h1>Mon Panier :</h1>
    @if(count($datas)>0)

        @foreach($datas as $offer)
                <div class="well" style="display: flex; border: 1px grey solid; padding: 10px; margin: 20px 50px;">
                                            
                    <div style="margin: 20px; width: 100%;">
                        <h3>title : {{$offer->Title}}</h3>
                        <h6>item_id : {{$offer->item_id}}</h6>
                        <h6>seller_id : {{$offer->seller_id}}</h6>
                        <h6>end date : {{$offer->end_date}}</h6>
                        <h6>sold {{$offer->sold}}</h6>
                        <h6>initial price :{{$offer->Initial_Price}}</h6>
                        <h6>offer_id {{$offer->offer_id}}</h6>
                        <h6>offer_price {{$offer->offer_price}}</h6>
                        <h6>state offer {{$offer->state}}</h6>
                        <h6>buyer_id {{$offer->buyer_id}}</h6>
                        <h6>purchase_id {{$offer->purchase_id}}</h6> 
                    </div>
                </div>
        @endforeach
    @else
        <p> Nous n'avons trouvé aucun article dans votre panier pour l'instant.
            <br> Allez faire vos achats ! </p>
    @endif
@endsection

