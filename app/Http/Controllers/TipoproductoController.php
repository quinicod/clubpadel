<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipoproducto;
use App\Productos;
use Illuminate\Support\Facades\DB;

class TipoproductoController extends Controller
{
    public function show()
    {
        $productos = Productos::all();
        $tipos = Tipoproducto::all();
        return view('admin/adminTipos', compact('tipos','productos'));
    }
    public function store()
    {
        
        $this->validate(request(), [
            'nombre' => 'required|max:100|unique:tipoproductos', 

        ]);
        Tipoproducto::create(request()->all());
        return redirect('admin/adminTipos')->with('añadido', 'Añadido correctamente');
    }
    public function destroy($nombre)
    {
        $productos = Productos::all();
        foreach ($productos as $p) {
            if ($p->tipo == $nombre) {
                return redirect('admin/adminTipos')->with('error', 'No puedes eliminar un tipo de producto si tienes productos que pertenecen a ese tipo.');
                //return view('admin/adminTipos', compact($contenido));
            }
        }
        DB::table('tipoproductos')->where('nombre','=',$nombre)->delete();
        return redirect('admin/adminTipos')->with('hecho', 'Eliminado correctamente');
    }
}
