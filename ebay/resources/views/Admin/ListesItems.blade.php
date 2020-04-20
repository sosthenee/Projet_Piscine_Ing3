@extends('layouts.layout')

 @section('content')
 
<h1>All Information About the Items</h1>
<br>


@foreach ($items as $item)
    @if($item->admin_state==="approve")
    <div id="accordion">
        <div class="card">
          <div class="card-header" >
            <h5 class="mb-0">
              <button class="btn btn-link" data-toggle="collapse" data-target={{"#i" . $item->id}} aria-expanded="false" >
                <strong>{{$item->Title}}</strong>
              </button>
                   <form action="/ListesItems/retirerItems" method="post">
                {{ csrf_field() }}
            <input hidden type="number" name="id" value="{{$item->id}}">
            <input type="submit" class="btn btn-outline-danger btn-lg" value="Retirer" style="float: right;">
        </form>
            </h5>
          </div>
      
          <div id="{{"i".$item->id}}" class="collapse " data-parent="#accordion">
            <div class="card-body">
                <ul class="list-group">
                <li class="list-group-item">{{$item->Description}}</li>
                <li class="list-group-item">{{$item->Initial_Price}}</li>
                <li class="list-group-item">{{$item->Category}}</li>
                <li class="list-group-item">{{$item->sell_type}}</li>
                <li class="list-group-item">{{$item->start_date}}</li>
                <li class="list-group-item">{{$item->end_date}}</li>
                <li class="list-group-item active">{{$item->admin_state}}</li>
                <li class="list-group-item">{{$item->sold}}</li>
                
                </ul>
            </div>
           </div>
        </div>
    </div>
   <br>
    @endif
@endforeach
   

@endsection