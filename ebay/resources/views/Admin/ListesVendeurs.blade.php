@extends('layouts.layout')

@section('content')
  <h1>Demandes d'approbation vendeurs</h1>
  <br>

  @foreach ($users as $user)
    @if($user->role==='seller' || $user->role==='buyerseller')

      <div id="accordion">
        <div class="card">
          <div class="card-header" id="headingOne">
            <h5 class="mb-0">
              <button class="btn btn-link" data-toggle="collapse" data-target={{"#i" . $user->id}} aria-expanded="true" aria-controls="collapseOne">
                <strong>{{$user->firstname}}</strong>
              </button>
              <form action="/ListesVendeurs/retirerVendeur" method="post">
                      {{ csrf_field() }}
                  <input hidden type="number" name="id" value="{{$user->id}}">
                  <input type="submit" class="btn btn-outline-danger btn-lg" value="Retirer" style="float: right;">
              </form>
            </h5>
          </div>
      
          <div id="{{"i".$user->id}}"  class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
                <ul class="list-group">
                  <li class="list-group-item">{{$user->email}}</li>
                  <li class="list-group-item">{{$user->lastname}}</li>
                  <li class="list-group-item">{{$user->username}}</li>
                  <li class="list-group-item">{{$user->pseudo}}</li>
                  <li class="list-group-item active">{{$user->role}}</li>
                </ul>
            </div>
          </div>
        </div>
      </div>
      <br>
        
    @endif
  @endforeach

@endsection
