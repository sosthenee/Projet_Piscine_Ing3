
@extends('layouts.layout')

@section('content')
<div class="container" style="display: flex; flex-direction: row;"> 
 
 <div style="width: 100%;">

    <form id="upload" action="/vendre/ajouter/action" method="POST"  style="width: 100%;" class="uploader"  accept-charset="utf-8" enctype="multipart/form-data">

      {{ csrf_field() }} <!-- I don't know what is it-->
      <h1>Ajout d'un nouvel Item</h1>
      <hr>


        <div class="form-group row">
          <label class="col-sm-2 col-form-label" for="Title">Nom de l'item : </label> 
          <div class="col-sm-10">
            <input class="form-control form-control-lg" id="Title"type="text" name="Title" placeholder="ex: montre" required> 
          </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="Description">Description : </label> 
            <div class="col-sm-10">
            <TEXTAREA class="form-control" name="Description" id="Description" placeholder="ex: cette objet est en cuire..." rows=4 style="width: 100%;"required></textarea> 
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Catégorie : </label> 
            <div class="col-sm-10">
            <select class="form-control" name="Category" size=1 required>
              <option value="">Choisissez votre catégorie ...</option>
              <option value="Ferraille ou Trésor">Ferraille ou Trésor</option>
              <option value="Bon pour le Musée">Bon pour le Musée</option>
              <option value="Accessoire VIP">Accessoire VIP</option>
            </select>
          </div>
        </div>

      <div class="form-group row">
        <div class="col-sm-5">
          <div class="form-group row">
              <label class="col-sm-4 col-form-label">Insertion de médias : </label> 
              <div class="col-sm-8">
                @csrf
                <input id="file-upload" class="form-control-file" type="file" name="file[]" accept="image/*, video/*"  onchange="readURL(this);" multiple > 
                <span class="text-danger">{{ $errors->first('fileUpload') }}</span>
                <span id="erreurs"></span>
              </div>
          </div>

          
          <div class="form-group row">
              <label class="col-sm-4 col-form-label">Type de vente : </label> 
              <div class="col-sm-8">
              <div class="form-check">
                <input id="myCheckBid" name="myCheckBid" class="form-check-input" type="checkbox" required>
                <label class="form-check-label" for="myCheckBid">Enchère</label>
              </div>
              <div class="form-check">
                <input id="myCheckBestOffer" name="myCheckBestOffer" class="form-check-input" type="checkbox" >
                <label class="form-check-label" for="myCheckBestOffer">Meilleure Offre</label> 
              </div>
              <div class="form-check">
                <input id="myCheckImmediatPurchase" name="myCheckImmediatPurchase" class="form-check-input"  type="checkbox" >
                <label class="form-check-label" for="myCheckImmediatPurchase">Achat Immédiat</label>
              </div>
              </div>
          </div>
          
          <div class="form-group row"> 
            <label class="col-sm-4 col-form-label">Date de début : </label>
            <div class="col-sm-8">   
            <input id="start_date" class="form-control"  style="width: 210px;" type="datetime-local" name="start_date"  value="2021-01-01T21:11" required> 
            </div>
          </div>
        </div>

        <div class="col-sm-7">
        <div id="carouselControls" class="carousel slide" data-ride="carousel" style="border: 1px solid; width: 30vw; height: 18vw;">
          <ol id="carousel-indicators" class="carousel-indicators">
              <li data-target="#carouselControls" data-slide-to="0" class="active"></li>
          </ol>
          <div id="carousel-inner"class="carousel-inner ">
                  
              <div class= "carousel-item active" >
                <img id="first_picture" class="d-inline-block " style="width: 30vw; height: 18vw; " src="/storage/unnamed.png" alt="no pictures" > 
              </div>          
          </div>
          <a class="carousel-control-prev" href="#carouselControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
          </a>
        </div> 
        </div>
      </div>

      <div id="BidContent" style="display: none;">
        <hr>
        <h4> Enchère</h4>
        
          
          <div class="form-group row"> 
            <label class="col-sm-2 col-form-label">Date de fin : </label>  
            <div class="col-sm-10">
            <input id="end_date" class="form-control"  style="width: 210px;"type="datetime-local" name="end_date" > 
            </div>
          </div>
          <div class="form-group row"> 
            <label class="col-sm-2 col-form-label">Prix initial : </label>  
            <div class="col-sm-10 row" >
              <input id="price_min" class="form-control"  style="width: 200px;"type="number" name="price_min" min=0 placeholder="00,00" >
              <div class="input-group-append">
                <div class="input-group-text">€</div>
              </div> 
            </div>
          </div>
        
      </div>
      <div id="BestOfferContent" style="display: none;">
        <hr>
        <h4> Meilleur offre</h4>
        <p>Aucunes informations supplémentaires n'est necessaire. Si un client est interessé il vous fera une proposition</p>
      </div>

      <div id="ImmediatPurchaseContent" style="display: none;">
        <hr>
        <h4> Achat Immédiat</h4>
        <table>
          <div class="form-group row">
              <label class="col-sm-2 col-form-label">Prix : </label> 
              <div class="col-sm-10 row" >
              <input id="price" class="form-control" style="width: 200px;" type="number" name="price" min=0 placeholder="00,00" >
              <div class="input-group-append">
                <div class="input-group-text">€</div>
              </div>
              </div>
          </div>
        </table>
      </div>

      <hr>
      <input class="btn btn-primary btn-lg " type="submit" value="Ajouter un Item">

      
    </form> 


   
  
    
     
  </div>
 </div>   
@endsection