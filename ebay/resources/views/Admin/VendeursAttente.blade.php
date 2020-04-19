@extends('layouts.layout')

 @section('content')
 
<h1>All Information About the sellers</h1>
 <br>

@foreach ($users as $user)
    
  @if($user->role==='askseller')
    
      <div id="accordion">
        <div class="card">
          <div class="card-header" id="headingOne">
            <h5 class="mb-0">
              <button class="btn btn-link" style="float: left;" data-toggle="collapse" data-target={{"#i" . $user->id}} aria-expanded="true" aria-controls="collapseOne">
                <strong>{{$user->firstname}}</strong>
              </button>
              <form method="POST" action="/VendeursAttente/approuver/{{$user->id}}">
                {{ csrf_field() }}  
                 <button class="btn btn-outline-success"style="float: right; "  type="submit">APPROUVER</button>
                 </form>
             <form method="POST" action="/VendeursAttente/refuser/{{$user->id}}">
                {{ csrf_field() }}  
                 <button class="btn btn-outline-danger" style="float: right; margin-right: 5px;" type="submit">REFUSER</button>
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
 
  @endif
@endforeach

    
@endsection





