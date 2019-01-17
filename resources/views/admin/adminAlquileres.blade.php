    @extends('layouts.adminNav')
    @section('cabecera')
      <title>Administrar Productos</title>
    @endsection
    @section('content')
            <div class="x_panel">
            <div class="x_title">
                <h2>Cancelar <small>Alquiler</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a></li>     
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                @if (session('correcto'))
                  <div class="alert alert-success" >
                      {{ session('correcto') }}
                  </div>
                @endif
                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Usuario</th>
                            <th>Tipo Pista</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                     @foreach ($alquileres as $a)
		                        <tr>
		                            <td><br>{{ $a->id_user }}</td>
		                            <td><br>{{ $a->id_pista }}</td>
		                            <td><br>{{ $a->fecha }}</td>
		                            <td><br>{{ $a->id_hora }}</td>
		                            <td>
		                              <form action="adminAlquileres/{{$a->id_user }}/{{$a->id_pista}}/{{$a->fecha}}/{{ $a->id_hora}}" method="POST">
		                                {{ csrf_field() }}
		                                <button type="submit" class="btn btn-default btn-lg botonEliminar"><span class="glyphicon glyphicon-trash"></span></button>
		                              </form>
		                            </td>
		                        </tr>
                	@endforeach
                    </tbody>
                </table>
            </div>
        </div>
  @endsection