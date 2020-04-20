@extends('layouts.layout')

@section('content')
  <h1>Demandes d'approbation items</h1>

  <br>
       
  @foreach ($items as $item)
    @if($item->admin_state==="waiting")
      <div id="accordion">
        <div class="card">
          <div class="card-header">
            <h5 class="mb-0">
              <button class="btn btn-link" style="float: left;"  data-toggle="collapse" data-target={{"#i" . $item->id}} aria-expanded="true" aria-controls="{{"i".$item->id}}">
                <strong>{{$item->Title}}</strong>
              </button>
              <form method="POST" action="/ItemsAttente/approuver/{{$item->id}}">
                {{ csrf_field() }}  
                <button class="btn btn-outline-success"  style="float: right; " type="submit">APPROUVER</button>
              </form>
              <form method="POST" action="/ItemsAttente/refuser/{{$item->id}}">
                {{ csrf_field() }}  
                <button class="btn btn-outline-danger" style="float: right; margin-right: 5px;" type="submit">REFUSER</button> 
              </form>
            </h5>
          </div>
      
          <div id="{{"i".$item->id}}" class="collapse "  data-parent="#accordion">
            <div class="card-body">
                <ul>
                  <li><strong>Description :</strong> {{$item->Description}}</li>
                  <li><strong>Initial_Price :</strong> {{$item->Initial_Price}} €</li>
                  <li><strong>Category :</strong> {{$item->Category}}</li>
                  <li><strong>sell_type :</strong>{{$item->sell_type}}</li>
                  <li><strong>start_date :</strong>{{$item->start_date}}</li>
                </ul>
            </div>
          </div>
        </div>
      </div> 
      <br>  
    @endif
  @endforeach  
@endsection
