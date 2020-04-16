


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

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
        </style>
    </head>
    <body>
        <div class="flex-center position-ref ">
                        <div class="content">

                <div class="links">
                    <a href="{{ url('/VendeursAttente') }}">Demandes de vendeurs</a>
                    <a href="{{ url('/ItemsAttente') }}">Demande d'items</a>
                    <a href="{{ url('/ListesVendeurs') }}">Vendeurs actuels</a>
                    <a href="{{ url('/ListesItems') }}">Items actuels</a>
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
        
              @yield('content')      
        
    </body>
</html>
