<?php

namespace App\Http\Controllers;

use Session;
use App\Productos;
use App\marcas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MarcasController extends Controller
{

    public function show()
    {
        $productos = Productos::all();
        $marcas = marcas::all();
        return view('admin/adminMarcas',compact('marcas','productos'));
    }
    public function store()
    {
        $this->validate(request(), [
            'nombre' => 'required|max:100|unique:marcas', 

        ]);
        marcas::create(request()->all());
        return redirect('admin/adminMarcas')->with('añadido', 'Añadido correctamente');
    }
    public function destroy($nombre)
    {
        $marcas = marcas::all();
        $productos = Productos::all();
        foreach ($productos as $p) {
            if ($p->marca == $nombre) {
                return redirect('admin/adminMarcas')->with('error', 'No puedes eliminar una marca de producto si hay productos que pertenecen a ella.');
                //return view('admin/adminMarcas', compact('data','marcas'));
            }
        }
        DB::table('marcas')->where('nombre','=',$nombre)->delete();
        //return back();
        return redirect('admin/adminMarcas')->with('hecho', 'Eliminado correctamente');
    }
}
