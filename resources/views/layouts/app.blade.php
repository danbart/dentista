<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/estilos.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('css/ventanasModales.css')}}"> -->
    <title>Clinica Dental</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="page-top" class="index" data-pinterest-extension-installed="cr1.3.4">
    <nav class="navbar navbar-inverse navbar-fixed-top navbar-shrink">
        <div class="container-fluid">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Clinica Dental
                </a>
                <a class="navbar-brand" ><img class="logo" src="{{asset('img/logo.png')}}"></a>
                <strong style="font-size:10px;" class="badge badge-info">beta</strong>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <!-- Left Side Of Navbar -->
              @if(Auth::guest() )
                <ul class="nav navbar-nav">
                  @if(\Request::is('/'))
                  <li class="active" ><a href="{{ url('/') }}">Inicio</a></li>
                  @else
                  <li ><a href="{{ url('/') }}">Inicio</a></li>
                  @endif
                </ul>
              @else
              @if(Auth::user()->role == 'admin')
                <ul class="nav navbar-nav">
                    @if(\Request::is('/'))
                    <li class="active" ><a href="{{ url('/') }}">Inicio</a></li>
                    @else
                    <li ><a href="{{ url('/') }}">Inicio</a></li>
                    @endif
                    @if(!\Request::is('home'))
                    <li><a href="{{ url('/home') }}">Usuarios</a></li>
                    @else
                    <li class="active"><a href="{{ url('/home') }}">Usuarios</a></li>
                    @endif
                    @if(\Request::is('todas-citas'))
                    <li class="active"><a href="{{ url('/todas-citas') }}">Citas</a></li>
                    @else
                    <li><a href="{{ url('/todas-citas') }}">Citas</a></li>
                    @endif
                    <li><a href="{{ url('/register') }}">Registrar</a></li>
                </ul>
                @else
                <ul class="nav navbar-nav">
                  @if(\Request::is('/'))
                  <li class="active" ><a href="{{ url('/') }}">Inicio</a></li>
                  @else
                  <li ><a href="{{ url('/') }}">Inicio</a></li>
                  @endif
                  @if(\Request::is('lista-cita/'.Auth::user()->id))
                  <li class="active"><a href="{{ url('/lista-cita/'.Auth::user()->id) }}">Citas</a></li>
                  @else
                  <li><a href="{{ url('/lista-cita/'.Auth::user()->id) }}">Citas</a></li>
                  @endif
                </ul>
                @endif
                 @endif
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        @if(\Request::is('login'))
                        <li class="active"><a class="page-scroll" href="{{ url('/login') }}">Acceder</a></li>
                        @else
                        <li><a class="page-scroll" href="{{ url('/login') }}">Acceder</a></li>
                        @endif
                        @if(\Request::is('register'))
                        <li class="active"><a class="page-scroll" href="{{ url('/register') }}">Registro</a></li>
                        @else
                        <li><a class="page-scroll" href="{{ url('/register') }}">Registro</a></li>
                        @endif
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" >{{ Auth::user()->nombre.' '. Auth::user()->apellido }}
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                              <li> <a href="{{url('/editar-usuario/'.Auth::user()->id)}}">Editar Perfil</a> </li>
                              <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Salir</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @if(\Request::is('/'))
    <div  style="margin-top:40px">
    @else
    <div  style="margin-top:100px">
    @endif

    @yield('content')
</div>
<script src="{{asset('js/nuevo.js')}}"></script>
<script src="{{asset('js/jquery.js')}}"></script>
    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <br>
    <br>
    <hr>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright © Ingenieria de Software 2018</span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline">
                         <li><a><img class="redes2" src="{{asset('img/facebook-4-32.png')}}"></a>
                            </li>
                            <li><a><img class="redes2" src="{{asset('img/twitter-4-32.png')}}"></a>
                            </li>
                            <li><a><img class="redes2" src="{{asset('img/instagram-4-32.png')}}"></a>
                            </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li><a href="#">ingenieriaUMG@gmail.com</a>
                        </li>
                        <li><a href="#">Telefono 7777-7777</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>






</body>
</html>
