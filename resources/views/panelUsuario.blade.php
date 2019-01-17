@extends('layouts.panelUsu')

@section('content')

<div class="col-md-9">
	<div>
		<img src="{{ asset('images/usuario.png')}}"><br><br>
	</div>

</div>
	<div class="col-md-9">
		<div class="col-md-4 col-md-offset-4">
			<form method="POST" action="modificar">
				<input type="hidden" name="id" value="{{ $user['id'] }}">
				<div class="form-group">
					<label class="label" for="">Nombre</label>
					<input type="text" class="form-control" minlength="3" id="" value="{{ $user['nombre'] }}" name="nombre" >
				</div>
				<div class="form-group">
					<label class="label" for="">Apellidos</label>
					<input type="text" class="form-control" id="" minlength="3" value="{{ $user['apellidos'] }}" name="apellidos">
				</div>
				<div class="form-group">
					<label class="label" for="">Teléfono</label>
					<input type="text" minlength="9" maxlength="9" class="form-control" id="" value="{{ $user['telefono']}}" name="telefono">
				</div>
				<div class="form-group">
					<label class="label" for="">Número de cuenta</label>
					<input type="text" minlength="10" maxlength="10" class="form-control" id="" value="{{ $user['numeroCuenta'] }}" name="numeroCuenta">
				</div>
				{{ csrf_field() }}
				<button type="submit" class="btn btn-primary">Modificar</button>
			</form>
		</div>
	</div>
@if (session('aviso'))
  <script type="text/javascript"> alert('{{ session('aviso') }}');  </script>
@endif
@endsection