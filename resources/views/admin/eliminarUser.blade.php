  @extends('layouts.adminNav')
    @section('cabecera')
      <title>Eliminar Usuario</title>
    @endsection
    @section('content')
        <div class="x_panel">
            <div class="x_title">
                <h2>Eliminar <small>Users</small></h2>
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
                            <th>Apellidos</th>
                            <th>Telefono</th>
                            <th>Email</th>
                            <th>Numero de cuenta</th>
                            <th>Saldo</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                      @foreach ($usuarios as $user)
                        @if ($user->role != "admin")
                        <tr>
                            <td><br>{{ $user->nombre }}</td>
                            <td><br>{{ $user->apellidos }}</td>
                            <td><br>{{ $user->telefono }}</td>
                            <td><br>{{ $user->email }}</td>
                            <td><br>{{ $user->numeroCuenta }}</td>
                            <td><br>{{ $user->saldo }}</td>
                            <td>
                              <form method="POST" action="eliminarUser/{{ $user->id }}">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-default btn-lg botonEliminar" name="delete"><span class="glyphicon glyphicon-trash"></span></button>
                              </form>
                          </td>
                        </tr>
                        @endif
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
		