<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title> 

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!--link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="/js/myJS_CreateItem.js" ></script>

    <script>
        /*var form=document.getElementById('upload');
            var request= new XMLHttpRequest();

            form.addEventListener('submit', function(e){
                e.preventDefault();
                var formDate=new FormData(form);
                request.open('post', 'items/action');
                request.addEventListener("load", transferComplete);
                request.send(formdata);
            });
            function transferComplete(data){
                console.log(data.currentTarget.response);
            }
            */
      /*  function readURL(input, id) {
            

            if (input.files&& input.files[0]) {
                var reader;
                 reader = new FileReader();
        
                reader.onload = function (e) {
                    $('#file-image0').attr('src', e.target.result);
                };
        
                reader.readAsDataURL(input.files[0]);
                $('#file-image0').removeClass('hidden');
            }*/
            /*
            var temp=0;
            
            //$('#erreurs').html(input.files.length);
            while(temp<input.files.length){
                var file=input.files[temp];
                
                if ( file) {
                    $('#erreurs').html('#file-image'+temp);
                    //$('#file-image'+temp).attr('src', "e.target.result");
                  //  readers.push(new FileReader());
                  var reader=new FileReader();
                  var temp2=temp
                    reader.onload = function (e) {
                        $('#file-image'+temp2).attr('src', e.target.result);
                    };
                    reader.readAsDataURL(file);
                    $('#file-image'+temp2).removeClass('hidden');
                }
                temp++;
        
            }
        }*/
    </script> 
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container" > 
                @include('inc.errorsuccess')
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
