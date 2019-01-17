<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('name', 'Laravel') }}</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="{{ asset('js/app.js') }}" rel="stylesheet">
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
        <link href="{{ asset('css/tienda.css') }}" rel="stylesheet">
</head>

<body>

    
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="linea "><br></div>
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="{{ route('index') }}"><img src="{{asset('images/logo.png')}}" class="posicion"></a>
            </div>
            <ul class="nav navbar-nav">
              <li class="{{request()->is('/') ? 'active' : ''}}  negrita"><a href="{{ route('index') }}">Bienvenido</a></li>
              <li class="{{request()->is('tienda') ? 'active' : ''}} negrita"><a href="{{ route('tienda') }}">Tienda</a></li>
              @if (auth()->check())
                    <li class="{{request()->is('alquilar') ? 'active' : ''}} negrita"><a href="{{ route('alquilar') }}">Alquilar</a></li>
              @endif
              <li class="{{request()->is('contacta') ? 'active' : ''}} negrita"><a href="#contacta">Contacta</a></li>
            </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        @if (auth()->check())
                            <li><a class="p1" href="{{ route('showCarrito')}}"> <span class="glyphicon glyphicon-shopping-cart glyphicon"></span></a></li>
                        @endif
                        <!-- Authentication Links -->
                        @guest
                            <li class="{{request()->is('login') ? 'active' : ''}} negrita"><a href="#"  class="modal" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                            <li class="{{request()->is('register') ? 'active' : ''}} negrita"><a href="{{ route('register') }}"><span class="glyphicon glyphicon-user"></span> Registrarse</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->nombre}} {{Auth::user()->apellidos}} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href=" {{ route('panelUsuario') }}">
                                            Panel de Usuario
                                        </a>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Cerrar sesión
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

    @yield('content')
    </div>
    <div class=" row gris"><br></div>
    <div class="row container-fluid pie">

        <div class="col-md-3 borde" id="contacta">
            <h4 class="
            ">CONTACTA</h4><br>
            <p>Teléfono: 69696969</p>
            <p>Email: oleoleole@gmail.com</p>
            <p>Skipe: oleolemicai@skipe.com</p>
            <p>Ubicación: C/Maria Auxiliadora nº69</p>
        </div>
        <div class="col-md-3">
            <h4 class="
            ">SÍGUENOS</h4><br>
            <img src="{{asset('images/face.png')}}" class="tam" target="_blank" alt="facebook">
            <img src="{{asset('images/insta.png')}}" class="tam" target="_blank" alt="instagram"><br>
            <img src="{{asset('images/twi.png')}}" class="tam" target="_blank" alt="facebook">
            <img src="{{asset('images/google.png')}}" class="tam" target="_blank" alt="facebook">

        </div>
        <div class="col-md-3">
            <h4 class="
            ">SUSCRIBETE</h4><br>
            <p>Recibe información de nuestros torneos y ofertas.</p><br>
            <div class="form-inline">
                <input type="text" class="form-control personal" placeholder="Introduzca tu email...">
                <button class="btn btn-default">Enviar</button> 
            </div>
            
        </div>
        <div class="col-md-3">
            <h4 class="
            ">UBICACION</h4><br>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d172547.10661467508!2d-6.230037849936112!3d36.52613154998705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6c2e50b34b5ea8f6!2sClub+de+Padel+Puerto+Sherry!5e0!3m2!1ses!2sus!4v1516624237372" width="350" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>

        </div>
    </div>


    <!--modal-->
<div class="container">
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Iniciar sesión</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Direccion de correo</label>

                            <div class="col-md-6 input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6 input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recuerdame
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit " class="btn btn-primary color">
                                    INICIAR SESION
                                </button>
                            </div>
                        </div>
                    </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
  

    @if (session('abrirVentana'))
    <script type="text/javascript"> 
        $(document).ready(function()
        {
            $("#myModal").modal("show");
        });
    </script>
    @endif
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
