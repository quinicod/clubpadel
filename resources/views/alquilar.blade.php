@extends('layouts.app')

@section('content')

<div class="fondoalquila">
<div class="SeleccionaFecha margenav" align="center">
  <form action="alquilarnuevo" method="post">
    {{ csrf_field() }}
        <label class="Kalam"><h1>Fecha Reserva:</h1></label>
        <input type='date' class='Kalam' name='entrada' id='entrada' value='{{$fecha}}' min=".date('Y-m-d')." required>
        <button type="submit" class="btn btn-default">Enviar</button>
  </form>     
</div>
<br>  <br>  
<div class="container-fluid">
<table class="table text-center" border="1" align="center">
  <thead>
    <tr class="text-center">
      <th class="trancho">Horas</th>
      @foreach($pistas as $p)
        <th>
          <h2 class="text-center negrita">Pista - {{ $p->id }}</h2>
          <p class="pull-left">{{$p->tipo}}</p>
          <p class="pull-right">{{ $p->precio }} €/h</p>
        </th>
      @endforeach
    </tr>
  </thead>
    <tbody>
      @foreach($horas as $h)
        <?php 
          $cont=0;
          $contador=0;
        ?>
        <tr>
          <td>{{ $h->hora }}</td>
            @foreach($pistas as $p)
              <?php 
                $cont=0;
                $contador=0;
              ?>
                
              @foreach($alquila as $a)
                <?php $contador++; ?>
                  
                  @if($a->id_hora == $h->id && $a->fecha == $fecha && $a->id_pista == $p->id && $fecha >= $fechaActual && $h->hora > $hora)
                    <td class="fondoalquilado">ocupada</td>
                  @else
                    <?php $cont++; ?>
                  @endif
                
              @endforeach
                @if($cont == $contador && $fecha > $fechaActual)
                    <td class="fondoalquilar">
                      <form action="alquilarpista" name="alquilar" method="POST" ">
                        {{ csrf_field() }}
                        <input type="hidden" name="precio_pista" value="{{$p->precio}}">
                        <input type="hidden" name="saldo" value="{{$saldo}}">
                        <input type="hidden" name="id_pista" value="{{$p->id}}">
                        <input type="hidden" name="fecha" value="{{$fecha}}">
                        <input type="hidden" name="id_hora" value="{{$h->id}}">
                        <button class="btn btnfull" type="submit">Libre</button>
                        
                      </form>
                    </td>
                @elseif($cont == $contador && $fecha == $fechaActual && $h->hora > $hora)
                  <td class="fondoalquilar">
                      <form action="alquilarpista" name="alquilar" method="POST" ">
                        {{ csrf_field() }}
                        <input type="hidden" name="precio_pista" value="{{$p->precio}}">
                        <input type="hidden" name="saldo" value="{{$saldo}}">
                        <input type="hidden" name="id_pista" value="{{$p->id}}">
                        <input type="hidden" name="fecha" value="{{$fecha}}">
                        <input type="hidden" name="id_hora" value="{{$h->id}}">
                        <button class="btn btnfull" type="submit">Libre</button>
                        
                      </form>
                    </td>
                @endif
                @if($fecha == $fechaActual && $h->hora < $hora)
                  <td class="fondogris colorblanco">---</td>
                @endif

            @endforeach
          </tr>    
        @endforeach
    </tbody>
</table>
                  @if (session('alquilado'))
                      <script type="text/javascript"> alert('{{ session('alquilado') }}');  </script>
                  @endif
</div>
</div>
<br><br>

@endsection