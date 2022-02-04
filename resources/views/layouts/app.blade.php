@extends('layout.app')
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

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img id="myImg" src="data:image/png;base64,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" >
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
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('html_tugas') }}">{{ __('HTML') }}</a>
                            </li>  
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('html') }}">{{ __('Coba') }}</a>
                            </li>  
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('pets.users') }}">{{ __('Pets') }}</a>
                            </li>  
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('subjects') }}">{{ __('Users') }}</a>
                            </li>                           
                            <li class="nav-item dropdown">
                                    
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
            @yield('content2')
        </main>
    </div>
</body>
</html>
