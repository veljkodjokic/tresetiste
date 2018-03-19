<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('partials/favicon')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property=og:title content=Tresetiste>
    <meta property=og:url content=https://www.tresetiste.com>
    <meta property=og:type content=website>
    <meta property=og:description content='Carp fishing lake'>
    <meta property=og:image content='https://tresetiste.com/pics/jezero-tresetiste.jpg'>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Tresetište</title>

    <!-- Styles -->
    <link href="/css/app.css"  type="text/css" rel="stylesheet">
    <script src="/js/app.js"></script>
    <script src="//code.jquery.com/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.0.6/sweetalert2.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.0.6/sweetalert2.min.css" rel="stylesheet">

</head>
<body>
    <div id="app" >
        <nav class="navbar navbar-default navbar-static-top" style="opacity: 0.9;">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->

                            <li><a href="/">Početna</a></li>

                            <li><a href="/pravilnik">Pravilnik</a></li>

                            <li><a href="/rezervacija">Rezervacija</a></li>

                            <li><a href="/jezero">Jezero</a></li>

                            <li><a href="/cenovnik">Cenovnik</a></li>

                            <li><a href="/galerija">Galerija</a></li>

                            <li><a href="/kontakt">Kontakt</a></li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    Istorija<span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="/istorija/2001">
                                            2001
                                        </a>
                                        
                                        <a href="/istorija/2002">
                                            2002
                                        </a>

                                        <a href="/istorija/2003">
                                            2003
                                        </a>

                                        <a href="/istorija/2004">
                                            2004
                                        </a>

                                        <a href="/istorija/2005">
                                            2005
                                        </a>

                                        <a href="/istorija/2006">
                                            2006
                                        </a>

                                        <a href="/istorija/2007">
                                            2007
                                        </a>

                                        <a href="/istorija/2008">
                                            2008
                                        </a>

                                    </li>
                                </ul>
                            </li>

                            <li><a href="/ekologija">Ekologija</a></li>
                        @guest
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    Admin<span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="/admin/rezervacije">
                                            Rezervacije
                                        </a>

                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Izloguj se
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
<link rel="stylesheet" type="text/css" href="/css/app.css">
<div class="container">
    <div class="row" style="background-color: transparent;">
            <div class="panel panel-default" style="background-color: transparent; border-color: transparent;">
                <div class="panel-heading" style="background-color: transparent; border-bottom-width:0;"><img src="/pics/page-header.jpg" style="width: 100%; max-height: 315px;"></div><br>

                <div class="panel-body" style="position: relative;">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div id="content-container">
                        @yield('content')
                    </div>
                    <div id="sticky">
                        <div id="sponsor">
                            @include('partials.sponzori')
                        </div>
                    </div>
                    <div id="footer"><hr>&copy;2018 www.tresetiste.com</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
@if ($errors->any())
    <script type="text/javascript">
        swal ( "There seems to be a problem with your input." ," @foreach ($errors->all() as $error) {{ $error }} @endforeach ",  "error");
    </script>
@endif
@include('partials/msgs')
</body>
</html>
