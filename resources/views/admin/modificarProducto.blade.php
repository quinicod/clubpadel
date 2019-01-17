@extends('layouts.adminNav')
@section('cabecera')
  <title>Modificar Producto</title>
@endsection
@section('content')
<div class="container topnav">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default ">
                <div class="panel-heading ">Modificar</div>

                <div class="panel-body ">
                    <form class="form-horizontal" method="POST" action="../modificado">
                        {{ csrf_field() }}
                    	@foreach ($producto as $p)
                        <input type="hidden" name="id" id="id" value="{{ $p->id }}">

                        <div class="form-group">
                            <label for="nombre" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" minlength="3" class="form-control" name="nombre" value="{{ $p->nombre}}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="descripcion" class="col-md-4 control-label">Descripcion</label>

                            <div class="col-md-6">
                                <input id="descripcion" type="text" minlength="3" class="form-control" name="descripcion" value="{{ $p->descripcion}}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="precio" class="col-md-4 control-label">Precio</label>

                            <div class="col-md-6">
                                <input id="precio" type="text"  class="form-control" name="precio" value="{{ $p->precio}}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="talla" class="col-md-4 control-label">Talla</label>

                            <div class="col-md-6">
                                <input id="talla" type="text"  class="form-control" maxlength="10" name="talla" value="{{ $p->talla}}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="stock" class="col-md-4 control-label">Stock</label>

                            <div class="col-md-6">
                                <input id="stock" type="text" class="form-control" maxlength="10" name="stock" value="{{ $p->stock}}" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="marca">Marca <span class="required">*</span>
                            </label>
                            <div class="col-md-6">
                                <select class="form-control" name="marca">
                                  @foreach($marcas as $marca)
                                    @if ($p->marca == $marca->nombre)
                                        <option selected>{{ $p->marca }}</option>
                                    @else
                                        <option >{{ $marca->nombre }}</option>
                                    @endif
                                  @endforeach  
                                </select> 
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="tipo">Tipo <span class="required">*</span>
                            </label>
                            <div class="col-md-6">
                                <select class="form-control" name="tipo">
                                  @foreach($tipos as $tipo)
                                    @if ($p->tipo == $tipo->nombre)
                                        <option selected>{{ $p->tipo }}</option>
                                    @else
                                        <option >{{ $tipo->nombre }}</option>
                                    @endif
                                  @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="imagen" class="col-md-4 control-label">Ruta Imagen</label>

                            <div class="col-md-6">
                                <input id="imagen" type="text" class="form-control"  name="imagen" value="{{ $p->imagen}}" required>
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