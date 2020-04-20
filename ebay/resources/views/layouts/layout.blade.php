
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ebay SRW</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script  src= "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <link rel= "stylesheet" href= "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script  src= "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        
        <script src="/js/myJS_getInput.js" ></script>
        <script src="/js/myJS_CreateItem.js" ></script>
        
        <script src="/js/myJS_addPayment.js" ></script>
        <script src="/js/myJS_countdown.js" ></script>
        <script src="/js/myJS_createAccount.js" ></script>
        
        
        <!--------------------------------------------
        ------script to add elements to carrousel-----
        ------it works only to create item------------>
        <script> 
            function readURL(input, id) {
                if (input.files&& input.files[0]) {
                    var input1;
                    var input2;
                    //$('#first_picture').attr('src', window.URL.createObjectURL(input.files[0]));
                    input1= "<div class= \"carousel-item active\" > <img class=\"d-inline-block \" style=\"width: 30vw; height: 18vw; \" src=\"" + window.URL.createObjectURL(input.files[0])+ "\" alt=\"Video can't be show here but be sure that it will be online when you will submit\" >  </div> "; 
                    input2="<li data-target=\"#carouselControls\" data-slide-to=\"0\" class=\"active\"></li>";
                    for(var i=1; input.files[i];i++)
                    {
                    input1+= "<div class= \"carousel-item \" > <img class=\"d-inline-block \" style=\"width: 30vw; height: 18vw; \" src=\"" + window.URL.createObjectURL(input.files[i])+ "\" alt=\"Video can't be show here but be sure that it will be online when you will submit\" >  </div> "; 
                    input2+="<li data-target=\"#carouselControls\" data-slide-to=\""+i+"\" class=\"active\"></li>";
                    }
                    document.getElementById('carousel-inner').innerHTML=input1;
                    document.getElementById('carousel-indicators').innerHTML=input2;
                } 
            }
        </script>


        

        <!-- Styles -->
        <style>
         
            html, body {
                background-color: #fff;
                
                font-family: 'Nunito', sans-serif;
                
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .links a:hover{
                    background:  rgba(0, 0, 0, 0.03);
                    transition: border-bottom 0.2s;
            }
            .m-b-md {
                margin-bottom: 30px;
            }
            
            a{
                color: black;
                transition: border-bottom 0.2s;
            }
            a:hover{
                color: black;
                text-decoration: none;
            }
            .sticky{
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                
            }
            .dropdown:hover>.dropdown-menu {
            display: block;
            }
                        .dropdown:hover>.dropdown-menu {
            display: block;
            }

footer {
background-color: #b5b5b5;
    position: absolute;
    width: 100%;
    
}

            
        </style>
    </head>
    <body>
        <nav class="sticky" style="z-index:5;">

            <nav class="navbar navbar-expand-lg navbar-light bg-light links">
            
                
                <a class="navbar-brand" href="/">Mon site</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="/achat">Accueil <span class="sr-only">Accueil</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="/achat/Category" >
                                Categories
                            </a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="/achat/SellType">
                                Les types d'achats
                            </a>
                        </li>
                        
                        
                    </ul>
                    
                </div>
                
                @if (Route::has('login'))
                    <div class="collapse navbar-collapse">
                        
                        @auth
                            <div class="nav-item active">
                                <a class="nav-link" href="/vendre">Vendre</a>
                            </div>
                            
                            <div class=" my-2 my-lg-0 active">
                                <a class="nav-link" href="/panier">Panier</a>
                            </div>
                            <div class="nav-item active dropdown">
                                <a class="nav-link dropdown-toggle" href="/myAccount" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Votre compte
                                </a>
                                @php
                                    $myuserconnect= Auth::user();
                                @endphp

                                <div class="dropdown-menu  dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="/myAccount/myInfos">Mes informations</a>
                                    <div class="dropdown-divider"></div>
                                    @if($myuserconnect->role =='buyer'||$myuserconnect->role =='buyerseller')
                                        <a class="dropdown-item" href="/user/adress">Mes adresses de livraison</a>
                                        <a class="dropdown-item" href="/user/payments">Mes options de paiement</a>
                                        <a class="dropdown-item" href="/purshase">Mes commandes</a>
                                        <a class="dropdown-item" href="/mybestoffA">Mes meilleurs offres en cours</a>
                                        <div class="dropdown-divider"></div>
                                    @endif
                                    @if($myuserconnect->role =='seller'||$myuserconnect->role =='buyerseller'||$myuserconnect->role =='admin')
                                        <a class="dropdown-item" href="/mybestoffV">Mes ventes meilleurs offres</a>
                                        <div class="dropdown-divider"></div>
                                    @endif
                                    @if($myuserconnect->role =='admin')
                                        <a class="dropdown-item" href="/VendeursAttente">Demandes vendeurs</a>
                                        <a class="dropdown-item" href="/ItemsAttente">Demandes Items</a>
                                        <a class="dropdown-item" href="/ListesVendeurs">Les vendeurs</a>
                                        <a class="dropdown-item" href="/ListesItems">Les items</a>
                                        <div class="dropdown-divider"></div>
                                    @endif
                                    
                                    <a class="dropdown-item" href="/logout">Deconnexion</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/myAccount">TOUT</a>
                                </div>
                            </div>
                            <!--a href="{{ url('/home') }}">Home</a-->
                        @else
                            <a class="nav-link"href="{{ route('login') }}">Login </a>

                            @if (Route::has('register'))
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            @endif
                        @endauth
                        
                    </div>
                @endif
            
            </nav>
        </nav>
        
        <main>
            <div class="container" style="margin-top: 60px; padding-top: 20px;">
                @include('inc.errorsuccess')
                @yield('content')     
            </div>
        </main>
      <!-- Footer -->
<footer class="page-footer font-small indigo">

  <!-- Footer Links -->
  <div class="container text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-3 mx-auto">

        <!-- Links -->
        <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h5>

        <ul class="list-unstyled">
          <li>
            <a href="#!">Very long link 1</a>
          </li>
          <li>
            <a href="#!">Very long link 2</a>
          </li>
          <li>
            <a href="#!">Very long link 3</a>
          </li>
          <li>
            <a href="#!">Very long link 4</a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none">

      <!-- Grid column -->
      <div class="col-md-3 mx-auto">

        <!-- Links -->
        <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h5>

        <ul class="list-unstyled">
          <li>
            <a href="#!">Link 1</a>
          </li>
          <li>
            <a href="#!">Link 2</a>
          </li>
          <li>
            <a href="#!">Link 3</a>
          </li>
          <li>
            <a href="#!">Link 4</a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none">

      <!-- Grid column -->
      <div class="col-md-3 mx-auto">

        <!-- Links -->
        <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h5>

        <ul class="list-unstyled">
          <li>
            <a href="#!">Link 1</a>
          </li>
          <li>
            <a href="#!">Link 2</a>
          </li>
          <li>
            <a href="#!">Link 3</a>
          </li>
          <li>
            <a href="#!">Link 4</a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none">

      <!-- Grid column -->
      <div class="col-md-3 mx-auto">

        <!-- Links -->
        <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h5>

        <ul class="list-unstyled">
          <li>
            <a href="#!">Link 1</a>
          </li>
          <li>
            <a href="#!">Link 2</a>
          </li>
          <li>
            <a href="#!">Link 3</a>
          </li>
          <li>
            <a href="#!">Link 4</a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="https://mdbootstrap.com/"> MDBootstrap.com</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
    </body>
</html>
