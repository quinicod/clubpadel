    @extends('layouts.adminNav')
    @section('cabecera')
      <title>Administrar Productos</title>
    @endsection
    @section('content')
        <div class="x_panel">
          <div class="x_title">
            <h2>Añadir <small>Producto</small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            @if (session('añadido'))
              <div class="alert alert-success" >
                  {{ session('añadido') }}
              </div>
            @endif
            <form class="form-horizontal form-label-left" method="POST" action="">
                {{ csrf_field() }}

              <div class="item form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="nombre" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="nombre" placeholder="" required="required" type="text" value="{{ old('nombre') }}">
                        @if ($errors->has('nombre'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nombre') }}</strong>
                            </span>
                        @endif
                </div>
              </div>


              <div class="item form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="descripcion">Descripcion <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="descripcion" name="descripcion" required="required" class="form-control col-md-7 col-xs-12" value="{{ old('descripcion') }}">
                        @if ($errors->has('descripcion'))
                            <span class="help-block">
                                <strong>{{ $errors->first('descripcion') }}</strong>
                            </span>
                        @endif
                </div>
              </div>


              <div class="item form-group{{ $errors->has('precio') ? ' has-error' : '' }}">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="precio">Precio <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="precio" name="precio" data-validate-linked="precio" required="required" class="form-control col-md-7 col-xs-12" value="{{ old('precio') }}">
                        @if ($errors->has('precio'))
                            <span class="help-block">
                                <strong>{{ $errors->first('precio') }}</strong>
                            </span>
                        @endif
                </div>
              </div>


             <div class="item form-group{{ $errors->has('talla') ? ' has-error' : '' }}">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="talla">Talla <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="talla" name="talla" data-validate-linked="talla" required="required" class="form-control col-md-7 col-xs-12" value="{{ old('talla') }}">
                    @if ($errors->has('talla'))
                            <span class="help-block">
                                <strong>{{ $errors->first('talla') }}</strong>
                            </span>
                        @endif
                </div>
              </div>


              <div class="item form-group{{ $errors->has('stock') ? ' has-error' : '' }}">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="stock">Stock <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input  id="stock" name="stock" type="number" data-validate-linked="stock" required="required" class="form-control col-md-7 col-xs-12" value="{{ old('stock') }}">
                        @if ($errors->has('stock'))
                            <span class="help-block">
                                <strong>{{ $errors->first('stock') }}</strong>
                            </span>
                        @endif
                </div>
              </div>


              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="marca">Marca <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select class="form-control" name="marca">
                      @foreach($marcas as $marca)
                        <option>{{ $marca->nombre }}</option>
                      @endforeach  
                    </select> 
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tipo">Tipo <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select class="form-control" name="tipo">
                      @foreach($tipos as $tipo)
                        <option>{{ $tipo->nombre }}</option>
                      @endforeach
                    </select>
                </div>
              </div>



              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="imagen">Ruta imagen <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="imagen" name="imagen" data-validate-linked="imagen" value="images/" required="required" class="form-control col-md-7 col-xs-12" >
                        @if ($errors->has('imagen'))
                            <span class="help-block">
                                <strong>{{ $errors->first('imagen') }}</strong>
                            </span>
                        @endif
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                  <button id="send" type="submit" class="btn btn-success">Insertar</button>
                </div>
              </div>
            </form>
          </div>
        </div>

        <div class="x_panel">
            <div class="x_title">
                <h2>Eliminar <small>Producto</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a></li>     
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Precio</th>
                            <th>Talla</th>
                            <th>Stock</th>
                            <th>Marca</th>
                            <th>Tipo</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($productos as $prod)
                        <tr>
                            <td><br>{{ $prod->nombre }}</td>
                            <td><br>{{ $prod->descripcion }}</td>
                            <td><br>{{ $prod->precio }}</td>
                            <td><br>{{ $prod->talla }}</td>
                            <td><br>{{ $prod->stock }}</td>
                            <td><br>{{ $prod->marca }}</td>
                            <td><br>{{ $prod->tipo }}</td>
                            <td><img src="{{asset($prod->imagen)}}" width="100" height="100"></td>
                            <td>
                              <form action="adminProductos/{{ $prod->id }}" method="POST">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-default btn-lg botonEliminar"><span class="glyphicon glyphicon-trash"></span></button>
                              </form>
                              <form action="modificarProducto/{{ $prod->id }}" method="POST">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-default btn-lg botonEliminar"><span class="glyphicon glyphicon-pencil"></span></button>
                            </form>
                            </td>

                        </tr>
                      @endforeach
                      @if (session('error'))
                          <div class="alert alert-danger" >
                              {{ session('error') }}
                          </div>
                      @endif
                      @if (session('hecho'))
                        <div class="alert alert-success" >
                            {{ session('hecho') }}
                        </div>
                      @endif
                    </tbody>
                </table>
            </div>
        </div>
  @endsection