<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="{{ asset('js/app.js') }}" rel="stylesheet">
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    </head>
    <body class="loading">
        
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="linea "><br></div>
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="{{ url('/') }}">Club Padel Caleta</a>
            </div>
            <ul class="nav navbar-nav">
              <li class="active"><a href="{{ url('/') }}">Bienvenido</a></li>
              <li><a href="#">Tienda</a></li>
              <li><a href="#">Contacta</a></li>
            </ul>
          <ul class="nav navbar-nav navbar-right">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in"></span> login</a>
                        <a href="{{ route('register') }}"><span class="glyphicon glyphicon-user"></span> Register</a>
                    @endauth
                </ul>
              </div>
            </nav>
            @endif
            <video id="mivideo" class="videot" autoplay="autoplay" loop>
                <source src="video/videofondo.mp4" type="video/mp4"></source>
            </video>
                <div class="divhome text-center jumbotron">
                    <h1>Juega con nosotros</h1><br>
                    <h4 class="gris">Puedes hacerte socio muy facil desde nuestra web<br>Disfruta de grandes ventajas!</h4>
                </div>
<!--modal-->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
<div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
  </div>
</div>

</body>
</html>