    @extends('layouts.adminNav')
    @section('cabecera')
      <title>Administrar Marcas</title>
    @endsection
    @section('content')
        <div class="x_panel">
          <div class="x_title">
            <h2>Añadir <small>Marca</small></h2>
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
                <h2>Eliminar <small>Marca</small></h2>
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
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($marcas as $marca)
                        <tr>  
                          <td><br>{{ $marca->nombre }}</td>
                          <td>
                                  <form method="POST" action="adminMarcas/{{ $marca->nombre }}">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-default btn-lg botonEliminar" name="delete"><span class="glyphicon glyphicon-trash"></span></button>
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