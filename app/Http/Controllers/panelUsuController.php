<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Pistas;
use App\Alquila;
use App\Horas;
use App\Compras;
use App\Pedidos;
use App\Productos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class panelUsuController extends Controller
{
    
    public function panelUsuario(){
        $id = Auth::id();
        $user = User::find($id);
        return view('panelUsuario', compact('user'));
    }
    public function saldo(){
        $id = Auth::id();
       
        $saldo=User::where('id', '=', $id)->get();
         return view('panelSaldo', compact('saldo'));
    }
    public function cambiarSaldo(){
        
        $data = request()->all();
        $id = Auth::id();
        $nuevosaldo = User::find($id);
        if($data['numC']==$nuevosaldo->numeroCuenta){
            $nuevosaldo->saldo+=$data['saldo'];
            $nuevosaldo->save();
        }
        return redirect('panelUsuario/saldo');
    }
    public function misReservas(){
        $id = Auth::id();
        $user = User::where('id', '=', $id)->get();
        $pistas = Pistas::all();
        $hora = Horas::all();
        $now = new \DateTime();
        $now->format('Y-m-d');
        $fecha=$now->format('Y-m-d');
        $alquileres = DB::table('alquilas')->where('fecha','>=',$now->format('Y-m-d'))->get();
        //extraemos los que tiene fechas mayor a la de hoy porque son los que se pueden cancelar realmente.
        return view('misReservas',compact('alquileres','pistas','user','hora','fecha'));

    }
    public function eliminarReserva($idUser,$idPista,$fecha,$hora){
        $alquiler = DB::table('alquilas')->where('id_pista','=',$idPista)->where('id_user','=',$idUser)->where('fecha','=',$fecha)->where('id_hora','=',$hora)->delete();
        $pista = Pistas::find($idPista);
        $user = User::find($idUser);
        if ($alquiler) {
            $devolver = $pista->precio * 0.75;
            $saldoUser = $user->saldo;
            $user->saldo = $user->saldo+$devolver;
            $user->save();
            return redirect('panelUsuario/misReservas')->with('elimreserva','Reserva eliminada con exito.');

        }else{
            return redirect('panelUsuario/misReservas')->with('elimreserva','Imposible eliminar la reserva');

        }
    }
    
    public function misCompras(){
    	$id = Auth::id();
    	$user = User::where('id', '=', $id)->get();
    	$compras= Compras::where('id_user','=',$id)->get();
    	$anterior = new \DateTime();
        $anterior= $anterior->modify('-15 day');
        $anterior= $anterior->format('Y-m-d');
        return view('misCompras', compact('user','compras','anterior'));
    }

    public function eliminarCompra($id,$fecha,$id_user,$precio_total){
        $pedido= Pedidos::where('id_compra','=',$id)->get();
        foreach ($pedido as $p) {
        	$id_pro=$p->id_producto;
        	$pro=Productos::find($id_pro);
        	$pro->stock+=$p->unidades;
        }
        DB::table('pedidos')->where('id_compra','=',$id)->delete();
        $compras = DB::table('compras')->where('id','=',$id)->where('fecha','=',$fecha)->where('id_user','=',$id_user)->where('precio_total','=',$precio_total)->delete();
        if ($compras) {
            $user = User::find($id_user);
            $user->saldo = $user->saldo+$precio_total;
            $user->save();
            return redirect('panelUsuario/misCompras')->with('elimcompra','Compra eliminada');
        }else{
            return redirect('panelUsuario/misCompras')->with('elimcompra','Imposible eliminar la compra');
        }

        
    }
    public function update()
    {
        $data = request()->all();
        $usuarios = DB::table('users')->where('id','<>',$data['id'])->get();
        foreach ($usuarios as $u) {
            if ($u->numeroCuenta == $data['numeroCuenta']) {
                return redirect('panelUsuario')->with('aviso','Error al modificar. Número de cuenta ya existente en la base de datos');
            }
        }
        $user = User::find($data['id']);
        $user->nombre = $data['nombre'];
        $user->apellidos = $data['apellidos'];
        $user->telefono = $data['telefono'];
        $user->numeroCuenta = $data['numeroCuenta'];
        $user->save();
        return redirect('panelUsuario')->with('aviso','Actualizado correctamente');
    }
}
