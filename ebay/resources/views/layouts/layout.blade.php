


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
                <link rel= "stylesheet" href= "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">
        <link rel= "stylesheet" href= "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel= "stylesheet" href= "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js">
         <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <script src="/js/myJS_CreateItem.js" ></script>
        <script src="/js/myJS_itemCarroussel.js" ></script>
        <script src="/js/myJS_menulayout.js" ></script>
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
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

            .m-b-md {
                margin-bottom: 30px;
            }
            
            a{
                    transition: border-bottom 0.2s;
            }
            
            a:hover{
                    border-bottom: 2px solid #e67e22;
            }
            .sticky{
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                
            }
            
        </style>
    </head>
    <body>
        <nav class="sticky">

            
        
            
    
                <nav class="navbar navbar-expand-md navbar-light bg-light">
  <a class="navbar-brand" href="#">Mon site</a>
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="#">Accueil <span class="sr-only">Accueil</span></a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Categories
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="#">Feraille ou trésor</a>
        <a class="dropdown-item" href="#">Bon pour le musée</a>
        <a class="dropdown-item" href="#">Accessoires VIP</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">TOUT</a>
      </div>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Options d'achats
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="#">Achat immédiat</a>
        <a class="dropdown-item" href="#">Enchère</a>
        <a class="dropdown-item" href="#">Meilleure offre</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">TOUT</a>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Vendre</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Votre compte</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Panier</a>
    </li>
  </ul>
                    @if (Route::has('login'))

                <div class=" links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>

            @endif
</nav>
        </nav>
        @include('inc.errorsuccess')
        @yield('content')      
        <script src="public/js/myJS_menulayout.js"></script>

    </body>
</html>
