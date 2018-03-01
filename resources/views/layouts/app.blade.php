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

    <a href="https://seal.beyondsecurity.com/vulnerability-scanner-verification/tresetiste.com"><img src="https://seal.beyondsecurity.com/verification-images/tresetiste.com/vulnerability-scanner-2.gif" alt="Website Security Test" border="0" /></a>
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

                            <li><a href="/">Naslovna Strana</a></li>

                            <li><a href="/pravilnik">Pravilnik Jezera</a></li>

                            <li><a href="/rezervacija">Rezervacija</a></li>

                            <li><a href="/jezero">Jezero</a></li>

                            <li><a href="/cenovnik">Cenovnik</a></li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    Foto Galerija<span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="/galerija/jezero">
                                            Jezero
                                        </a>

                                        <a href="/galerija/albumi">
                                            Albumi
                                        </a>

                                        <a href="/galerija/facebook">
                                            Facebook
                                        </a>

                                    </li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    Istorija Jezera<span class="caret"></span>
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
                            <li>
                                <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Izloguj se
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
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
                        <iframe id="fbpage" src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ftresetiste%2F&tabs=timeline&width=340&height=500&small_header=false&adapt_con  tainer_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="200" style="border:none;overflow:hidden; float: right; float: top;" scrolling="no" frameborder="0"   allowTransparency="true"></iframe>
    
                        <div id="sponsor">
                            <img src="/pics/boilieroller.png" class="sponsor">
                            <img src="/pics/restoran.jpg" style="border-radius: 7%" class="sponsor">
                            <img src="/pics/carpsystem.jpg" class="sponsor">
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
