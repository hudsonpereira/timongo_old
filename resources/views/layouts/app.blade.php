<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Eczar" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @auth
                            <li class="nav-item {{ Route::current()->getName() == 'home' ? "active" : "" }}">
                                <a href="{{ route('home') }}" class="nav-link">Início</a>
                            </li>

                            <li class="nav-item {{ Route::current()->getName() == 'explorer' ? "active" : "" }}">
                                <a href="{{ route('explorer') }}" class="nav-link">Explorar</a>
                            </li>

                            <li class="nav-item {{ Route::current()->getName() == 'quests' ? "active" : "" }}">
                                <a href="{{ route('quests') }}" class="nav-link">Missões</a>
                            </li>

                            <li class="nav-item {{ Route::current()->getName() == 'arsenal' ? "active" : "" }}">
                                <a href="{{ route('arsenal') }}" class="nav-link">Arsenal</a>
                            </li>

                            <li class="nav-item {{ Route::current()->getName() == 'skills' ? "active" : "" }}">
                                <a href="{{ route('skills') }}" class="nav-link">Habilidades</a>
                            </li>

                            <li class="nav-item {{ Route::current()->getName() == 'inventory' ? "active" : "" }}">
                                <a href="{{ route('inventory') }}" class="nav-link">Espólios</a>
                            </li>
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Entrar') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->nickname }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Sair') }}
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
        <main class="py-2">
            @include('partials.flash_messages')

            @yield('content')
        </main>
    </div>

    <footer class="container p-4">
        <p><i class="em em-game_die"></i> <span class="bold ml-2">Timongo RPG.</span></p>
    </footer>
</body>
</html>
