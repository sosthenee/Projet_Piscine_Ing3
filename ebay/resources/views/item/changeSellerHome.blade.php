@extends('layouts.layout')
@section('content')

<h1>Modification des informations de cette item</h1>
<br>
<div class="card">
    <div class="card-body">
        <form method="POST" action="/vendre/update/{{$item_infos->id}}"class="uploader"  accept-charset="utf-8" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field("PUT") }}

            @for($i=0; $i < count($items); $i++)
                <img  class="d-inline-block " style="width: 30vw; height: 18vw; "  src="/storage/{{$items[$i]->reference}}"  >
                <div>
                    <input  type="checkbox" name={{"d".$items[$i]->id}}>
                    Supprimer cette image
                </div>
            @endfor
            <br>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label"><strong>Insertion de nouveau média : </strong></label> 
                <div class="col-sm-10">
                    <input id="file-upload2" class="form-control-file" type="file" name="files[]" accept="image/*, video/*" multiple > 
                    <span class="text-danger">{{ $errors->first('fileUpload') }}</span>
                    <span id="erreurs"></span>
                </div>
            </div>
            <p> <strong> Type de vente : </strong>{{ $item_infos->sell_type}}</p>
            <p><strong>Date début de vente : </strong>{{substr($item_infos->start_date,0,10)}}</p>
            @if($item_infos->end_date)
                <p><strong>Date début de vente : </strong>{{substr($item_infos->start_date,0,10)}}</p>
            @endif
            <input class="form-control" type="text" value="{{ $item_infos->Title}}" name="title" required><br>
            <textarea class="form-control"  name="description" required>{{ $item_infos->Description}}</textarea>
            
            @if($item_infos->sold ==1)
                @php
                    $enable="disabled";
                @endphp
            @endif
            <button class="btn btn-outline-primary btn-lg" style="float: right; margin:10px" type="submit" {{$enable ?? ''}}>Modifier</button>
        </form>
        
        <form action="/ListesItems/retirerItems" method="post">
            {{ csrf_field() }}
            <input hidden type="number" name="id" value="{{$item_infos->id}}">
            <input type="submit" class="btn btn-outline-danger btn-lg" value="Supprimer" style="float: right;margin:10px" {{$enable ?? ''}}>
        </form>
    </div>
</div>
@endsection