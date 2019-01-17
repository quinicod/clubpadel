@extends('layouts/app')

@section('content')

<nav class="navbar navbar-default col-md-3 pull-left lateral2" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    
    <a class="navbar-brand titulo" href="#">Filtros</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Marcas <b class="caret"></b></a>
        <ul class="dropdown-menu">
          @foreach ($marcas as $marca)
        	<li>
        		<?php $num= $marca->nombre; ?>
        		<a href="{{ route('filtroMarcas',[$marca->nombre]) }}">{{$marca->nombre}}</a>
				<p class="coloritem pull-right">
					<?php $cont=0 ?>
					@foreach($elementoss as $elemento)
						@if($elemento->marca == $num)
							<?php $cont++; ?>
						@endif
					@endforeach
					{{ $cont }} Productos
				</p>
        	</li> 
        @endforeach
    	</ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tipos <b class="caret"></b></a>
        <ul class="dropdown-menu">
          @foreach ($tipos as $tipo)
        	<li>
        		<?php $num= $tipo->nombre; ?>
        		<a href="{{ route('filtroTipos',[$tipo->nombre]) }}">{{$tipo->nombre}}</a>
        		<p class="coloritem pull-right">
					<?php $cont=0 ?>
					@foreach($elementoss as $elemento)
						@if($elemento->tipo == $num)
							<?php $cont++; ?>
						@endif
					@endforeach
					{{ $cont }} Productos
				</p>
			</li> 
        @endforeach
        </ul>
      </li>
    </ul>

    {{ Form::open(['route' => ['buscar'], 'method' => 'GET', 'class' => 'navbar-form navbar-left']) }}
		<div class="form-group">
			<p>{{ Form::text('search', old('search'), ['class' => 'form-control', 'placeholder'=>'Productos']) }}</p>
		</div>
			<p>{{ Form::submit('Buscar', ['class' => 'btn btn-info']) }}</p>
	{{ Form::close() }}
  </div><!-- /.navbar-collapse <--><br><br>
  <a class="sinfiltro" href="{{ route('tienda') }}">Quitar filtros</a>
</nav>
<div class="container-fluid divnav">
	<?php  $contador=0 ?>
@foreach($elementos as $e)
	<?php $contador++ ?>
@endforeach
@if($contador == 0)+
	<h1 class="text-center tamañoletra">No hay productos</h1>
@else
	@foreach ($elementos as $productos)
			<div class="col-md-3 gallery text-center">
				<a target="_blank" href="">
				    <img src="{{asset($productos->imagen)}}" >
				 </a>
				 <div class="desc">
				 	<div class="row">
				 		<h4 class="pull-left hh4">{{ $productos->nombre }} {{ $productos->marca}}</h4>
				 		<p class="pull-right precio negrita">{{ $productos->precio }} €</p>
				 	</div>
				 	<div class="row">
				 		<p class="pull-left">Talla: {{ $productos->talla}}</p>
						<form id="{{ $productos->id }}" class="pull-right">
						  <p class="clasificacion">
						    <input id="radio1{{ $productos->id }}" name="estrellas" value="5" type="radio"><!--
						    --><label class="naranja" for="radio1{{ $productos->id }}">★</label><!--
						    --><input id="radio2{{ $productos->id }}" name="estrellas" value="4" type="radio"><!--
						    --><label class="naranja" for="radio2{{ $productos->id }}">★</label><!--
						    --><input id="radio3{{ $productos->id }}" name="estrellas" value="3" type="radio"><!--
						    --><label class="naranja" for="radio3{{ $productos->id }}">★</label><!--
						    --><input id="radio4{{ $productos->id }}" name="estrellas" value="2" type="radio"><!--
						    --><label class="naranja" for="radio4{{ $productos->id }}">★</label><!--
						    --><input id="radio5{{ $productos->id }}" name="estrellas" value="1" type="radio"><!--
						    --><label class="naranja" for="radio5{{ $productos->id }}">★</label>
						  </p>
						</form>
				 	</div>
				 	@if ($productos->stock > 0)
				 		<div class="row">
				 		@foreach($carrito as $card)
						 		@if($card->id_producto == $productos->id && $card->id_user == $id_usuario)
						 			<a href="{{ route('showCarrito')}}" class="pull-left red">En la cesta</a>
						 		@endif
						@endforeach
				 		<p class="pull-right" >En Stock: {{ $productos->stock }} </p>
				 	</div>
				 	@else
					 	<div class="row">
					 		<p class="pull-right" style="color: red">Sin Stock</p>
					 	</div>
					@endif
				 	<div class="row">
				 		
				 	</div>
				 	<div class="row">
				 		<p>{{ $productos->descripcion }}</p>
				 	</div>
				 	@if (auth()->check())
				 	<form action="{{ route('carrito',[$productos->id]) }}" method="POST" class="">
				 		{{ csrf_field() }}
					 	<div class="row">
					 		<button type="submit" href="" class="btn btn-primary ">Añadir a la cesta</button>
					 	</div>
		 	            
					</form>
					@else
						<div class="row">
							<a class="p1" href="#" data-toggle="modal" data-target="#myModal"">Logueate para comprar</a>
						</div>
					@endif
				 </div>
			</div>


	@endforeach
@endif
</div>
<div class="text-center">
	{{ $elementos->links() }}
</div>

@if (session('errorDuplicado'))
  <script type="text/javascript"> alert('{{ session('errorDuplicado') }}');  </script>
@endif

@endsection