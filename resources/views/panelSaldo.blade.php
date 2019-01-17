@extends('layouts.panelUsu')

@section('content')
<br><br><br>
	<div class="padd colorblanco">
		<h1>Saldo Actual:</h1>
		@foreach($saldo as $sal)
			<h1 class="verde">{{ $sal->saldo}} €</h1>
		@endforeach
	</div>
	<div class="pad">
		<form action="{{ route('cambiarSaldo') }}" method="POST">
			{{ csrf_field() }}
			<div class="col-md-4 form-inline marginado">
				<div class="form-group{{ $errors->has('numeroCuenta') ? ' has-error' : '' }}">
					<label class="colorblanco" for="">Nº de tarjeta:</label>
					<span class="glyphicon glyphicon-credit-card blanco"></span>
					<input type="text" id="numeroCuenta" name="numC" maxlength="10" class="form-control" value="ES" placeholder="ES" required>
					@if ($errors->has('numeroCuenta'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('numeroCuenta') }}</strong>
	                    </span>
	                @endif
	            </div>
			</div>
			<div class="col-md-4 form-inline">
				<label class="colorblanco" for="">Añadir Saldo:</label>
				<input type="text" name="saldo" placeholder="€" class="form-control" required>
			</div>
			<div class="col-md-9 paddd">
				<button type="submit" class="btn btn-default">Enviar</button>
			</div>
		</form>
	</div>

@endsection