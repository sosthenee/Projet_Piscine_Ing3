


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
                    border-bottom: 2px solid #e67e22;
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
            
        </style>
    </head>
    <body>
        <nav class="sticky" style="z-index:5;">
            <nav class="navbar navbar-expand-md navbar-light bg-light">
                <a class="navbar-brand" href="#">Mon site</a>
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="/achat">Accueil <span class="sr-only">Accueil</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="/achat/Category" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Categories
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Feraille ou trésor</a>
                            <a class="dropdown-item" href="#">Bon pour le musée</a>
                            <a class="dropdown-item" href="#">Accessoires VIP</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/achat/Category">TOUT</a>
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
                            <a class="dropdown-item" href="/achat/SellType">TOUT</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/vendre">Vendre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/myAccount">Votre compte</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/panier">Panier</a>
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
        
        <main>
            <div class="container" style="margin-top: 60px; padding-top: 20px;">
                
            <br><br><br>
                @include('inc.errorsuccess')
                @yield('content')     
            </div>
        </main>


    </body>
</html>
