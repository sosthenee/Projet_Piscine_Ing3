@extends('layouts.layout')
@section('content')

<h1>Update selling Item info</h1>
<br>
<form method="POST" action="/vendre/update/{{$item_infos->id}}"class="uploader"  accept-charset="utf-8" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field("PUT") }}

    <div class="card">
        <div class="card-body">
            @for($i=0; $i < count($items); $i++)
            <img  class="d-inline-block " style="width: 30vw; height: 18vw; "  src="/storage/{{$items[$i]->reference}}"  >
            <div>delete
            <input type="checkbox" name={{"d".$items[$i]->id}}> 
        </div>
            @endfor

    
    <br>
    <br>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Insertion de média : </label> 
        <div class="col-sm-10">
            <input id="file-upload2" class="form-control-file" type="file" name="files[]" accept="image/*, video/*" multiple > 
            <span class="text-danger">{{ $errors->first('fileUpload') }}</span>
            <span id="erreurs"></span>
        </div>
    </div>

    <input class="form-control" type="text" value={{ $item_infos->Title}} name="title" required><br>
    <input class="form-control" type="text" value={{ $item_infos->Description}}  name="description" required><br>
    
    <button class="btn btn-outline-primary" type="submit" >Update</button>
        </div>
    </div>
</form>
@endsection