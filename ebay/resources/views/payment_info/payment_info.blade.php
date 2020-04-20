
@extends('layouts.layout')
@section('content')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

    <h1>Mes moyens de paiement </h1>
    <div class="row">
        @foreach ($payement_infos as $payment_info)
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"> {{ $payment_info->cardType}} </li>
                            <li class="list-group-item"> {{ $payment_info->cardNumber}} </li>
                            <li class="list-group-item"> {{ $payment_info->cardName}} </li>
                            <li class="list-group-item"> {{ $payment_info->expirationDate}} </li>
                            <li  class="list-group-item"> {{ bcrypt($payment_info->securityCode)}} </li>
                        </ul>
                        <form method="POST" action="/payment/{{$payment_info->id}}">
                            {{ csrf_field() }}
                            {{ method_field("DELETE") }}
                            <br>
                            <button class="btn btn-outline-danger" type="submit" ><i class="fa fa-trash" aria-hidden="true"></i></button>
                            <a href="{{ url('/payment/update_payment/' . $payment_info->id) }}" style="float: right;" class="btn btn-xs btn-info pull-right">Edit </a>
                            <br>
                        </form>
                        <br> <br>
                    </div>
                </div>
                <br> <br>
            </div>
        
        @endforeach
    </div>
    <br> <br>
    <h2>Ajouter un nouveau moyen de paiement</h2>
    <br> <br>

    <div class="row">
        <aside class="col-sm-6">
            <article class="card">
                <div class="card-body p-5">
                    
                    <ul class="nav bg-light nav-pills rounded nav-fill mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="pill" href="#nav-tab-card">
                            <i class="fa fa-credit-card"></i> Credit Card</a></li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#nav-tab-bank">
                            <i class="fa fa-university"></i>  Bank Transfer</a></li>
                    </ul>
                    
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="nav-tab-card">
                            <form role="form" method="POST" action="/payment/create">
                                {{ csrf_field() }}
                                <input class="form-control" type="text" placeholder=" cardType" name="cardType" required><br>
                                <input class="form-control" type="text" placeholder=" cardName"  name="cardName" required><br>
                                <div class="input-group">
                                    <input class="form-control" type="number" placeholder=" cardNumber"  minlength="16" maxlength="16" name="cardNumber" required><br>
                                    <div class="input-group-append">
                                        <span class="input-group-text text-muted">
                                            <i class="fab fa-cc-visa"></i>   <i class="fab fa-cc-amex"></i>   
                                            <i class="fab fa-cc-mastercard"></i> 
                                        </span>
                                    </div>
                                </div>
                
                                <br>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input class="form-control"type="date" id="start_date_payment" placeholder=" expirationDate" name="expirationDate" required><br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input class="form-control" type="password"   minlength="4" maxlength="4"  placeholder=" securityCode" name="securityCode"  aria-describedby="cardhelp" required><br>
                                        </div> 
                                    </div>
                                </div>
                                <small id="cardhelp" class="form-text text-muted">We'll never share your private informations with anyone else.</small><br>
                                <!-- row.// -->
                                <button class="btn btn-outline-success" type="submit" >Create</button>
                            </form>
                        </div> <!-- tab-pane.// -->
                
                    </div> <!-- tab-content .// -->
                
                </div> <!-- card-body.// -->
            </article> <!-- card.// -->
        </aside>
    </div> 
    <br> <br><br> <br><br> <br><br> <br>
@endsection