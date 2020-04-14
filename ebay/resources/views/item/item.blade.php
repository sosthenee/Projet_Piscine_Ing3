@extends('layouts.app')

@section('content')
    <h1>All Information About Item</h1>
    
    
    @if(count($items)>0)
        @foreach($items as $item)
            <div class="well" style="display: flex; background: grey; padding: 10px; margin: 50px;">
                <div style="margin: 20px; width: 100%;">
                    <h3>{{$item->Title}}</h3>
                    <h5>{{$item->Category}}</h5>
                    <p>Nom_vendeur Pas dynamique</p>
                    <p>{{$item->Description}}</p>
                </div>

                <div style="width: 300px; background: red;  margin: 20px;">
                    <p>NON DYNAMIQUE 
                        <br>Ventes au enchère : {{$item->Price}}€
                    </p>
                </div>

                <div style="background: lightblue; margin: 20px;">
                    <p> Images Pas dynamique</p>
                </div>
            </div>
            
        @endforeach
    @else
        <p> Nous n'avons trouvé aucun article disponible pour l'instant.
            <br> Nous vous invitons à revenir plus tard. </p>
    @endif
@endsection
<!--<h1>Only Pictures</h1>
@foreach ($items as $item)
@foreach ( $item->media as $medias)
<li> {{ $medias->reference}} </li>
@endforeach
@endforeach-->