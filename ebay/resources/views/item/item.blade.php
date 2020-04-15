@extends('layouts.app')

 

@section('content')
    <h1>All Information About Item</h1>
    
    
    @if(count($items)>0)
        @php
            $id_item_temp=-1;
        @endphp
        @foreach($items as $item)
            @if($id_item_temp<>$item->item_id)

                <div class="well" style="display: flex; background: grey; padding: 10px; margin: 50px;">
                    <div style="margin: 20px; width: 100%;">
                        <h3>{{$item->Title}}</h3>
                        @php
                            $id_item_temp=$item->item_id;
                        @endphp
                        <h5>{{$item->Category}}</h5>
                        <p>Vendeur: {{$item->username}}</p>
                        <p>{{$item->Description}}</p>
                    </div>

                    <div style="width: 300px; background: red;  margin: 20px;">
                        <p>NON DYNAMIQUE 
                            <br>Ventes {{$item->sell_type}} : {{$item->Initial_Price}}€
                        </p>
                    </div>

                    <div style="background: lightblue; margin: 20px; width: 20vw;">
                        <img style="width: 100%; height: 100%; "src="storage/{{$item->reference}}" alt="{{$item->Title}}"> 
                    </div>
                </div>
            @endif

            
        @endforeach
    @else
        <p> Nous n'avons trouvé aucun article disponible pour l'instant.
            <br> Nous vous invitons à revenir plus tard. </p>
    @endif
@endsection

