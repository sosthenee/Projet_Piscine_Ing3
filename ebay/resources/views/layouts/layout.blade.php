


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ebay SRW</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
         <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <script src="/js/myJS_CreateItem.js" ></script>
        <script src="/js/myJS_itemCarroussel.js" ></script>
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
            
            
        </style>
    </head>
    <body>
        <div class="flex-center position-ref ">
            <div class="content">
                <div class="links">
                    <a href="{{ url('/vendre') }}">Vendre un item</a>
                    <a href="{{ url('/achat') }}">Acheter un item</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
            
            
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
        </div>
        <main>
            <div class="container" style="margin-top: 40px;">
                @include('inc.errorsuccess')
                @yield('content')      
            </div>
        </main>
        
    </body>
</html>
