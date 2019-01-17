@extends('layouts.adminNav')
@section('cabecera')
  <title>Modificar Usuario</title>
@endsection
@section('content')
<div class="container topnav">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default ">
                <div class="panel-heading ">Modificar</div>

                <div class="panel-body ">
                    <form class="form-horizontal" method="POST" action="../modificadoUser">
                        {{ csrf_field() }}
                    	@foreach ($user as $u)
						<input type="hidden" name="id" value="{{ $u->id }}">

                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label for="nombre" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" minlength="3" class="form-control" name="nombre" value="{{ $u->nombre}}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('apellidos') ? ' has-error' : '' }}">
                            <label for="apellidos" class="col-md-4 control-label">Apellidos</label>

                            <div class="col-md-6">
                                <input id="apelliods" type="text" minlength="3" class="form-control" name="apellidos" value="{{ $u->apellidos}}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
                            <label for="telefono" class="col-md-4 control-label">Telefono</label>

                            <div class="col-md-6">
                                <input id="telefono" type="text" minlength="9" maxlength="9" class="form-control" name="telefono" value="{{ $u->telefono}}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('numeroCuenta') ? ' has-error' : '' }}">
                            <label for="numeroCuenta" class="col-md-4 control-label">Numero cuenta</label>

                            <div class="col-md-6">
                                <input id="numeroCuenta" type="text" minlength="10" class="form-control" maxlength="10" name="numeroCuenta" value="{{ $u->numeroCuenta}}" required>
                            </div>
                        </div>
                        @endforeach
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <a href="..">
                                <button type="submit" class="btn btn-primary">
                                    Volver
                                </button></a>
                                <button type="submit" class="btn btn-success">
                                    Modificar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
  @endsection