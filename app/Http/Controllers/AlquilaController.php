<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alquila;
use App\User;
use App\Pistas;
use App\Horas;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AlquilaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        

    }
    
    public function show()
    {
        $user = User::all();
        $pistas = Pistas::all();
        $now = new \DateTime();
        $now->format('Y-m-d');

        $alquileres = DB::table('alquilas')->where('fecha','>',$now->format('Y-m-d'))->get();
        //extraemos los que tiene fechas mayor a la de hoy porque son los que se pueden cancelar realmente.
        return view('admin/adminAlquileres',compact('alquileres','pistas','user'));
    }

    public function usuAlquilar(){
        $now = new \DateTime();
        $fechaActual=$now->format('Y-m-d');
        $fecha=$now->format('Y-m-d');
        $hora = $now->format('H:m');
        $pistas=Pistas::where('estado','=','Disponible')->get();
        $horas=Horas::all();
        $alquila=Alquila::all();
        $id_usu = Auth::id();
        $user = User::find($id_usu);
        $saldo = $user->saldo;
        return view('alquilar', compact('pistas','horas','alquila','fecha','user','saldo','hora','fechaActual'));
    }

    public function alquilarFecha(){
        $now = new \DateTime();
        $fecha=$now->format('Y-m-d');
        $fechaActual=$now->format('Y-m-d');
        $hora = $now->format('H:m');
        $pistas=Pistas::all();
        $horas=Horas::all();
        $alquila=Alquila::all();
        $data=Request()->all();
        $id_usu = Auth::id();
        $user = User::find($id_usu);
        $saldo = $user->saldo;
        $fecha=$data['entrada'];
        return view('alquilar', compact('pistas','horas','alquila','fecha','user','saldo','hora','fechaActual'));
    }

    public function alquilarpista(){
        $data = request()->all();
        $fecha = $data['fecha'];
        $id_usu = Auth::id();
        $user = User::find($id_usu);
        $pista = Pistas::find($data['id_pista']);
        $precioPista = $pista->precio;
        
        if ($precioPista <= $user->saldo) {
            $user->saldo = $user->saldo-$precioPista;
            $user->save();
            DB::table('alquilas')->insert(
                [
                    'id_user' => $id_usu, 
                    'id_pista' => $data['id_pista'],
                    'fecha' => $data['fecha'],
                    'id_hora' => $data['id_hora'],
                ]
            );
            return redirect('alquilar')->with('alquilado','Pista alquilada correctamente.');
        }
        
        return redirect('alquilar')->with('alquilado','Saldo insuficiente para alquilar esta pista.');
    }

    public function destroy($idUser,$idPista,$fecha,$hora)
    {
        $alquiler = DB::table('alquilas')->where('id_pista','=',$idPista)->where('id_user','=',$idUser)->where('fecha','=',$fecha)->where('id_hora','=',$hora)->delete();
        $pista = Pistas::find($idPista);
        $user = User::find($idUser);
        $devolver = $pista->precio * 0.75;
        $saldoUser = $user->saldo;
        $user->saldo = $user->saldo+$devolver;
        $user->save();
        return redirect('admin/adminAlquileres')->with('correcto','Alquiler cancelado. Dinero correspondiente devuelto al usuario');
    }
}
