<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	@yield('cabecera')
    <link href="{{ asset('css/admin/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset ('css/admin/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/custom.min.css') }}" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col">
			  <div class="left_col scroll-view">
				<div class="navbar nav_title" style="border: 0;">
				  <a href="{{ url('admin') }}" class="site_title titulo"> <span class="fa fa-wrench"> Administrador</span></a>
				</div>
				
				<div class="clearfix"></div>

				<br />

				<!-- sidebar menu -->
				<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
				  <div class="menu_section">
					<h3>OPCIONES</h3>
					<ul class="nav side-menu">
					  <li><a><i class="fa fa-user"></i> Usuarios <span class="fa fa-chevron-down"></span></a> <!-- cambiar el span y poiner una cabecita de user -->
						<ul class="nav child_menu">
						  <li><a href="{{ url('admin/añadirUser') }}"">Añadir</a></li>
						  <li><a href="{{ url('admin/modificarUser') }}"">Modificar</a></li>
						  <li><a href="{{ url('admin/eliminarUser') }}">Eliminar</a></li>
						</ul>
					  </li>
					  <li><a><i class="fa fa-shopping-cart"></i> Tienda <span class="fa fa-chevron-down"></span></a> <!-- cambiar el span y poiner una cabecita de user -->
						<ul class="nav child_menu">
						  <li><a href="{{ url('admin/adminProductos') }}"">Productos</a></li>
						  <li><a href="{{ url('admin/adminMarcas') }}">Marcas</a></li>
						  <li><a href="{{ url('admin/adminTipos') }}">Tipo Producto</a></li>
						</ul>
					  </li>
					  <li><a><i class="fa fa-table"></i> Alquileres <span class="fa fa-chevron-down"></span></a> <!-- cambiar el span y poiner una cabecita de user -->
						<ul class="nav child_menu">
						  <li><a href="{{ url('admin/adminAlquileres') }}"">Administrar</a></li>
						</ul>
					  </li>
				  </div>

				</div>
				<!-- /sidebar menu -->

				<!-- /menu footer buttons -->
				<div class="sidebar-footer hidden-small">
				  <a data-toggle="tooltip" data-placement="top" title="Settings">
					<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
				  </a>
				  <a data-toggle="tooltip" data-placement="top" title="FullScreen">
					<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
				  </a>
				  <a data-toggle="tooltip" data-placement="top" title="Lock">
					<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
				  </a>
				  <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
					<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
					</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                     </form>
				</div>
				<!-- /menu footer buttons -->
			  </div>
			</div>

			<!-- Top navegacion -->
			<div class="top_nav">
				<div class="nav_menu">
					<nav>
						<div class="nav toggle">
							<a id="menu_toggle"><i class="fa fa-bars"></i></a><br>
						</div>
					</nav>
				</div>
			</div>

			<!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							
							<!-- Aqui es donde se añade el contenido de la pagina -->
							@yield('content')
						</div>
					</div>
				</div>
			</div>
			<!-- /page content -->

			<!-- footer content -->
			<footer>
			  <div class="pull-right">
				Club de Padel 
			  </div>
			  <div class="clearfix"></div>
			</footer>
			<!-- /footer content -->
		</div>
	</div>

	<script src="{{ asset('js/admin/jquery.min.js') }}"></script>
	<!-- Bootstrap -->
	<script src="{{ asset('js/admin/bootstrap.min.js') }}"></script>
	<!-- FastClick -->
	<script src="{{ asset('js/admin/fastclick.js') }}"></script>
	<!-- Datatables -->
	<script src="{{ asset('js/admin/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('js/admin/dataTables.bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/admin/dataTables.buttons.min.js') }}"></script>
	<script src="{{ asset('js/admin/buttons.bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/admin/buttons.flash.min.js') }}"></script>
	<script src="{{ asset('js/admin/buttons.html5.min.js') }}"></script>
	<script src="{{ asset('js/admin/buttons.print.min.js') }}"></script>
	<script src="{{ asset('js/admin/dataTables.fixedHeader.min.js') }}"></script>
	<script src="{{ asset('js/admin/dataTables.keyTable.min.js') }}"></script>
	<script src="{{ asset('js/admin/dataTables.responsive.min.js') }}"></script>
	<script src="{{ asset('js/admin/responsive.bootstrap.js') }}"></script>
	<script src="{{ asset('js/admin/dataTables.scroller.min.js') }}"></script>
	<script src="{{ asset('js/admin/jszip.min.js') }}"></script>
	<script src="{{ asset('js/admin/pdfmake.min.js') }}"></script>
	<script src="{{ asset('js/admin/vfs_fonts.js') }}"></script>

	<!-- Custom Theme Scripts -->
	<script src="{{ asset('js/admin/custom.min.js') }}"></script>

  </body>
</html>