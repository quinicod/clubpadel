<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class Usercontroller extends Controller
{

        
    public function show(){
        if (Auth()->user()->role === 'admin') {
            $usuarios= User::all();

            return view('admin/añadirUser', compact('usuarios'));
        }
    }
    public function store()
    {
        $this->validate(request(), [
        'nombre' => 'required|max:100|', 
        'apellidos' => 'required|max:100',
        'telefono' => 'required|numeric',
        'email' => 'required|unique:users|max:100',
        'numeroCuenta' => 'required|unique:users|max:10|min:10',
        'password' => 'required|string|min:6|confirmed',
        ]);
        $user = request()->all();
        //Uso insert y no create ya que por alguna extraña razon al crear el user desde el admin no me encryptaba la contraseña
        DB::table('users')->insert(
            [   
                'nombre' => $user['nombre'], 
                'apellidos' => $user['apellidos'],
                'telefono' => $user['telefono'],
                'email' => $user['email'],
                'numeroCuenta' => $user['numeroCuenta'],
                'password' => bcrypt($user['password']),         
            ]);
        return back();
    }
    public function destroy($id)
    {
    	$now = new \DateTime();
    	//Hay que comprobar que el usuario no tenga alquileres activos o compras con menos de 15 dias.
    	$compras = DB::table('compras')->where('id_user','=',$id)->get();
    	foreach ($compras as $c) {
    		$fecha = new \DateTime($c->fecha);
    		$diferencia= $now->diff($fecha);
    		if ($diferencia->d<15) {
    			return redirect('admin/eliminarUser')->with('error','No se puede eliminar al usuario porque tiene una/s compra activa aún.');
    		}    
    	}
        $alquileres = DB::table('alquilas')->where('id_user','=',$id)->get();
        foreach ($alquileres as $a) {
            $fecha = new \DateTime($a->fecha);
            if ($fecha > $now) {
                return redirect('admin/eliminarUser')->with('error','No se puede eliminar al usuario porque tiene uno o varios alquileres activos.');
            }
        }
		$user = User::find($id);
		$user->delete();
    	return redirect('admin/eliminarUser')->with('hecho','Usuario eliminado correctamente');
    }
    public function edit($id){
        $user = DB::table('users')->where('id','=',$id)->get();

        return view('admin/modificar', compact('user'));
    }
    public function update()
    {
        $data = request()->all();
        $usuarios = DB::table('users')->where('id','<>',$data['id'])->get();
        foreach ($usuarios as $u) {
            if ($u->numeroCuenta == $data['numeroCuenta']) {
                return redirect('admin/modificarUser')->with('error','Error al modificar. Número de cuenta ya existente en la base de datos');
            }
        }
        $user = User::find($data['id']);
        $user->nombre = $data['nombre'];
        $user->apellidos = $data['apellidos'];
        $user->telefono = $data['telefono'];
        $user->numeroCuenta = $data['numeroCuenta'];
        $user->save();
        return redirect('admin/modificarUser');
    }



}
