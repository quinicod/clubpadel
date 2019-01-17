@extends('layouts.panelUsu')
@section('content')

	<h1 class="colorblanco">Mis Reservas</h1>
	<div class="col-md-9 marginado2">
		<table id="datatable" class="table colorblanco">
            <thead>
                <tr>
                    <th class="text-center">Usuario</th>
                    <th class="text-center">Nombre Pista</th>
                    <th class="text-center">Tipo Pista</th>
                    <th class="text-center">Fecha</th>
                    <th class="text-center">Hora</th>
                    <th class="text-center">Anular Alquiler</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alquileres as $a)        		
		            <tr>
		                <td>
		                   	@foreach($user as $u)
								{{$u->nombre}} {{$u->apellidos}}
		                   	@endforeach
		                </td>
		                   	@foreach($pistas as $p)
								@if ($a->id_pista == $p->id )
				                    <td>Pista -- {{ $p->id }}</td>
				                @endif
		                   	@endforeach
		                   	@foreach ($pistas as $p)
				                @if ($a->id_pista == $p->id )
				                    <td>{{ $p->tipo }}</td>
				                @endif
				            @endforeach
		                <td>{{ $a->fecha }}</td>
		                <td>
			                @foreach($hora as $h)
			                  	@if($a->id_hora == $h->id)
									{{$h->hora}}
								@endif
			                @endforeach
		                </td>
		                <td>
		                	@if($a->fecha > $fecha)
						        <form action="../misReservas/{{$a->id_user }}/{{$a->id_pista}}/{{$a->fecha}}/{{ $a->id_hora}}" method="POST">
						            {{ csrf_field() }}
						             <button type="submit" class="btn btn-default btn-lg botonEliminar"><span class="glyphicon glyphicon-trash"></span></button>
						        </form>
						    @else
						    	<p>No puedes anular la reserva</p>
						    @endif
		                </td> 	
		            </tr>
		        @endforeach
            </tbody>
        </table>
        @if (session('elimreserva'))
            <script type="text/javascript"> alert('{{ session('elimreserva') }}');  </script>
        @endif
    </div>

@endsection