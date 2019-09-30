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
        <header class="flex-center">
            <div class="container flex-center position-ref">
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
                        Mural de Recados - Registrar
                    </div>
                    <div class="links">
                        @auth
                            <a href="{{ url('/') }}">Home</a>
                        @else
                            <a href="{{ url('/login') }}">Login</a>
                            <a href="{{ url('/register') }}">Register</a>
                        @endauth
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </header><!-- .container -->
        <div class="container content-itself flex-center">
            <form action="{{ url('/register') }}" class="form register" method="post">
                @csrf <!-- {{ csrf_field() }} -->
                <label for="username">
                    <span>Nome de usuário</span>
                    <input type="text" name="name" placeholder="Nome de usuário" />
                </label>
                <label for="user_pass">
                    <span>Email</span>
                    <input type="email" name="email" />
                </label>
                <label for="user_pass">
                    <span>Senha</span>
                    <input type="password" name="password" />
                </label>
                <label for="user_pass">
                    <span>Confirmação da Senha</span>
                    <input type="password" name="password_confirmation" />
                </label>
                <button>Registrar</button>
            </form>
        </div><!-- .container content-itself -->
    </body>
</html>
