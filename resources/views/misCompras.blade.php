@extends('layouts.panelUsu')
@section('content')

<h1 class="colorblanco">Mis Compras</h1>
	<div class="col-md-9 marginado2">
		<table id="datatable" class="table colorblanco">
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Fecha</th>
                    <th>Precio Total</th>
                    <th>Devolver</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($compras as $c)        		
		            <tr>
		                <td>
		                   	@foreach($user as $u)
								{{$u->nombre}} {{$u->apellidos}}
		                   	@endforeach
		                </td>
				        <td>{{ $c->fecha }}</td>
		                <td>{{ $c->precio_total }}</td>
		                <td>
		                	@if($c->fecha < $anterior )
		                		<p>No puedes devolver la compra</p>
		                		<p>(+ de 15 Dias)</p>
		                	@else 
			                    <form action="../misCompras/{{ $c->id}}/{{$c->fecha}}/{{$c->id_user }}/{{$c->precio_total}}" method="POST">
			                        {{ csrf_field() }}
			                        <button type="submit" class="btn btn-default btn-lg botonEliminar"><span class="glyphicon glyphicon-trash"></span></button>
			                    </form>
			                @endif
		                </td> 	
		            </tr>
		        @endforeach
            </tbody>
        </table>
        @if (session('elimcompra'))
            <script type="text/javascript"> alert('{{ session('elimcompra') }}');  </script>
        @endif
    </div>

@endsection