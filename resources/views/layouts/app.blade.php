<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="https://himatifumg.com/storage/images/himatif.png">

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/common.js') }}"></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/css/bootstrap-switch-button.min.css"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/dist/bootstrap-switch-button.min.js">
    </script>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm sticky-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a
                                class="nav-link{{ strpos(url()->current(), '/berita') ? ' active' : '' }}"
                                href="/berita">Berita</a></li>
                        <li class="nav-item"><a
                                class="nav-link{{ strpos(url()->current(), '/programkerja') ? ' active' : '' }}"
                                href="/programkerja">Program Kerja</a></li>
                        <li class="nav-item"><a
                                class="nav-link{{ strpos(url()->current(), '/profil') ? ' active' : '' }}"
                                href="/profil">Profil</a></li>
                        @role('admin')
                        <li class="nav-item"><a
                                class="nav-link{{ strpos(url()->current(), '/admin') ? ' active' : '' }}"
                                href="/admin">Admin Page</a></li>
                        @endrole
                        @role('user')
                        <li class="nav-item"><a
                                class="nav-link{{ strpos(url()->current(), '/user') ? ' active' : '' }}"
                                href="/user">User Page</a></li>
                        @endrole
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            {{-- @if (Route::currentRouteName() != 'login')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::currentRouteName() != 'register')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif --}}
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                                                                             document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-3">
            @yield('content')
        </main>
        <footer class="text-center text-white fixed-bottom" style="background-color: rgba(0, 0, 0, 0.2); ">
            <!-- Copyright -->
            <div class="p-3 text-dark navbar">
                <div class="">
                    <!-- Youtube -->
                    <a class=" btn btn-primary
                    btn-floating m-1" style="background-color: #ff0000;" href="https://www.youtube.com/c/HimatifUMG"
                    role="button"><i class="fa fa-youtube-play"></i>
                    Himatif UMG</a>

                    <!-- Google -->
                    <a class="btn btn-primary btn-floating m-1" style="background-color: #dd4b39;"
                        href="https://mail.google.com/mail/u/0/#inbox?compose=GTvVlcSHwrwzFlLwsBNlRTLJJxGqWVvZBcjLZClLdtSCSLJdxhZvFCjZVZSgRvLNlvrXShSsrTbKr"
                        role="button"><i class="fa fa-envelope"></i> himatifunmuh@gmail.com</a>

                    <!-- Instagram -->
                    <a class="btn btn-primary btn-floating m-1" style="background-color: #ac2bac;"
                        href="https://www.instagram.com/himatif_umg/" role="button"><i class="fa fa-instagram"></i>
                        himatif_umg</a>

                    <!-- Whatsapp -->
                    <a class="btn btn-primary btn-floating m-1" style="background-color: #00a800;"
                        href="https://api.whatsapp.com/send?phone=6281331122859" role="button"><i
                            class="fa fa-whatsapp"></i> 081331122859</a>
                </div>
                <div class="">
                    © 2021 Copyright:
                    <a class=" text-dark"
                    href="https://himatifumg.com/">himatifumg.com</a>
                </div>
            </div>
            <!-- Copyright -->
        </footer>
    </div>
</body>

</html>
