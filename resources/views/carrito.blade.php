@extends('layouts.app')

@section('content')
<head>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/carro.css') }}" rel="stylesheet">
</head>
    <div class="container-fluid principal">
        <div class="col-md-7">
                <table class="table carro" border="0">
                    <tr class="info">
                        <th colspan="2" width="80" class="delete"></th>
                        <th></th>
                        <th class="">Producto</th>
                        <th class="cantidad">Precio</th>
                        <th width="150" class="cantidad">Cantidad</th>
                        <th></th>
                    </tr>
                        @foreach ($carritos as $carrito)
                            @foreach ($productos as $producto)
                                @if ($producto->id == $carrito->id_producto)
                                    <tr class="">
                                        <td colspan="2" class="delete"><br>
                                            <form action="eliminarCarro/{{ $producto->id }}" method="POST">
                                                {{ csrf_field() }}
                                                <button type="submit" class="botonEliminar"><i class="fa fa-trash fa-lg"></i></button>
                                             </form>
                                        </td>
                                        <td>
                                        </td>
                                        <td> <img height="120" src="{{ $producto->imagen }}">
                                            {{ $producto->nombre }}
                                            
                                        </td>
                                        <td class="cantidad"><br>{{ $producto->precio }}€ </td>
                                        <td class="cantidad"><br>{{ $carrito->cantidad }}</td>
                                        <td  class="add"><br>
                                            <form action="addCantidad/{{ $producto->id }}" method="POST">
                                                {{ csrf_field() }}
                                                <button type="submit" class="botonEliminar"><i class="fa fa-arrow-circle-up fa-lg"></i> </button><br>
                                             </form>
                                            <form action="quitCantidad/{{ $producto->id }}" method="POST">
                                                {{ csrf_field() }}
                                                <button type="submit" class="botonEliminar"><i class="fa fa-arrow-circle-down fa-lg"></i> </button>
                                             </form>
                                        </td>
                                        
                                    </tr>
                                @endif
                            @endforeach
                        @endforeach
                </table><br><br><br><br><br><br><br><br>
            </div>
            <div class="col-md-1"></div>
            @if (session('errorStock'))
                      <script type="text/javascript"> alert('{{ session('errorStock') }}');  </script>
            @endif
            @if (session('errorSaldo'))
                      <script type="text/javascript"> alert('{{ session('errorSaldo') }}');  </script>
            @endif
        <div class="col-md-3">
            <table class="table carro">

                <tr>
                    <th colspan="2">TOTAL</th>
                    <th></th>
                </tr>
                <tr>
                    <td>Subtotal</td>
                    <td class="pull-right">{{ $total }}€</td>
                </tr>
                <tr>
                    <td>Envio</td>
                    @if ($total == 0)
                        <td class="pull-right pequeño">Gratis gastando más de 50€</td>
                    @elseif($total < 50)
                        <td class="pull-right">5.95€</td>
                    @else
                        <td class="pull-right">Gratis</td>
                    @endif
                </tr>
                <tr>
                    <td>Total</td>
                    @if ($total == 0)
                        <td class="pull-right">0€</td>
                    @elseif($total < 50)
                        <td class="pull-right">{{$total + 5.95}}€</td>
                    @else
                        <td class="pull-right">{{$total}}€</td>
                    @endif
                </tr>

            </table><br>
            <form action="comprar/{{ $total }}" method="POST">
                {{ csrf_field() }}
                <button  style="width:100%" class="btn btn-Primary pedido">Realizar Pedido</button>
            </form>
            @if (session('correcto'))
                <div class="alert alert-success" >
                    {{ session('correcto') }}
                 </div>
            @endif
        </div>
       
    </div>
    <div class="container-fluid posicionn text-center"><a href="{{route('tienda')}}"><i class="fa fa-arrow-circle-left fa-lg"></i> Segir comprando</a></div>
     
