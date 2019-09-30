<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Solutions - Mural de Recados</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <header class="flex-center">
            <div class="container position-ref">
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
                    <div class="title m-b-md">
                        Solutions - Login
                    </div>
                    <div class="links">
                        @auth
                            <a href="{{ url('/') }}">Home</a>
                        @else
                            <a href="{{ url('/login') }}">Login</a>
                            <a href="{{ url('/register') }}">Registrar</a>
                        @endauth
                    </div>
                    @if ( isset( $_GET[ 'fail'] ) )
                    <div class="alert alert-danger">
                        Erro: Confira os dados e tente novamente!
                    </div>
                    @endif
                </div>
            </div>
        </header><!-- .container -->

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
                    <form action="{{ url('/login') }}" class="form register" method="post">
                        @csrf <!-- {{ csrf_field() }} -->
                        <label for="email">
                            <span>Email</span>
                            <input type="email" name="email" />
                        </label>

                        <label for="user_pass">
                            <span>Senha</span>
                            <input type="password" name="password" />
                        </label>
                        <button>Logar</button>
                    </form>
                </div>
            </div>
        </div><!-- .container content-itself -->
    </body>
</html>
