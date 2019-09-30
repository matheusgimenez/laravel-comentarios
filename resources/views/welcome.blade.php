<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <body>
        <header class="container flex-center position-ref">

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    @auth
                        <a href="{{ url('/') }}">Home</a>
                        <a href="{{ url('/logout') }}">// Logado como {{ Auth::user()->name }} (SAIR)</a> 
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endauth
                </div>
            </div>
        </header>
        <!-- Conteudo -->
        <div class="container content-itself flex-center">
            <div class="flex-center position-ref">
                @if (Route::has('login'))
                    <div class="top-right links">
                        @auth
                            <a href="{{ url('/home') }}">Home</a>
                        @else
                            <a href="{{ url('/login') }}">Login</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
                <div class="content">
                    @auth
                    <form action="{{ url('/post') }}" class="form register" method="post">
                        @csrf <!-- {{ csrf_field() }} -->
                        <label for="msg">
                            <span>Escrever recado!</span>
                            <textarea name="msg" cols="30" rows="10"></textarea>
                        </label>
                        <button>Logar</button>
                    </form>
                    @endauth
                </div>
            </div>
        </div><!-- .container content-itself -->


    </body>
</html>
