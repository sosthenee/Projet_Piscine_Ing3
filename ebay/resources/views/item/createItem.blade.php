<!--
  <style>
    body {font-family: Arial, Helvetica, sans-serif;}
    * {box-sizing: border-box;}
    
    input[type=text], select, textarea {
      width: 100%;
      padding: 12px;
      border: 1px sotdd #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      margin-top: 6px;
      margin-bottom: 16px;
      resize: vertical;
    }
    
    input[type=submit] {
      background-color: #4CAF50;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    
    input[type=submit]:hover {
      background-color: #45a049;
    }
    
    .container {
      border-radius: 5px;
      background-color: #f2f2f2;
      padding: 20px;
    }
  </style>
    

-->

@extends('layouts.layout')

@section('content')
<div class="container" style="display: flex; flex-direction: row;"> 
 
 <div style="width: 100%;">

    <form id="upload" action="/vendre/ajouter/action" method="POST"  style="width: 100%;" class="uploader"  accept-charset="utf-8" enctype="multipart/form-data">

      {{ csrf_field() }} <!-- I don't know what is it-->
      <h1>Ajout d'un nouvelle Item</h1>
      <hr>
      <div class="row">
        <div style ="width: 70%;">
          <table id="createItemTable" style ="width: 100%;">

            <tr>
              <td><label >Nom de l'item : </label></td>
              <td><input type="text" name="Title" placeholder="ex: montre"></td>
            </tr>

            <tr>
              <td><label >Description : </label></td>
              <td><TEXTAREA name="Description" placeholder="ex: cette objet est en cuire..." rows=4 style="width: 100%;"></textarea></td>
            </tr>
            <tr>
              <td><label >Catégorie : </label></td>
              <td>
                <select name="Category" size=1>
                  <option value="">Choisissez votre catégorie ...</option>
                  <option value="Ferraille ou Trésor">Ferraille ou Trésor</option>
                  <option value="Bon pour le Musée">Bon pour le Musée</option>
                  <option value="Accessoire VIP">Accessoire VIP</option>
                </select>
              </td>
            </tr>

            <tr>
              <td><label >Insertion de média : </label></td>
              <td>
              @csrf
                <input id="file-upload" type="file" name="file[]" accept="image/*"  multiple > <!--onchange="readURL(this);"-->
                <span class="text-danger">{{ $errors->first('fileUpload') }}</span>
                <span id="erreurs"></span>
              </td>
 
            </tr>
            
            <tr>
              <td><label >Type de vente : </label></td>
              <td>
                <input id="myCheckBid" name="myCheckBid" type="checkbox" >&nbsp; Enchère
                <input id="myCheckBestOffer" name="myCheckBestOffer" type="checkbox" >&nbsp; Meilleure Offre
                <input id="myCheckImmediatPurchase" name="myCheckImmediatPurchase" type="checkbox" >&nbsp; Achat Immédiat
               
              </td>
            </tr>
          </table>


        </div>
        <div class="right" style="width: 30%; display:flex;">
            <div  style="background: grey; height: 15vh; width: 15vh; margin: auto;">
                <img id="file-image0" src="#" alt="Preview" style="display: none;">
                <img id="file-image1" src="#" alt="Preview" style="display: none;"class="hidden">
                <img id="file-image2" src="#" alt="Preview" style="display: none;"class="hidden">
                <img id="file-image3" src="#" alt="Preview" style="display: none;"class="hidden">
            </div>
        </div>
      </div>

        <div id="BidContent" style="display: none;">
          <hr>
          <h4> Enchère</h4>
          <table>
            <tr><td><label >Date de début : </label></td><td> <input id="start_date" type="date" name="start_date"  ></td></tr>
            <tr><td><label >Date de fin : </label></td><td><input id="end_date"type="date" name="end_date" ></td></tr>
            <tr><td><label >Prix initial : </label></td><td><input id="price_min"type="number" name="price_min" placeholder="00,00" >€</td></tr>
          </table>
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
          <tr><td><label >Prix : </label></td><td><input type="number" name="price" placeholder="00,00" >€</td></tr>
          </table>
        </div>

      <hr>
      <input class="btn btn-primary btn-lg " type="submit" value="Ajouter un Item">
    </form>   
  </div>
 </div>   
@endsection