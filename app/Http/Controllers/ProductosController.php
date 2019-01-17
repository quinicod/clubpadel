<?php

namespace App\Http\Controllers;

use App\marcas;
use App\Productos;
use App\Tipoproducto;
use App\Pedidos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductosController extends Controller
{    
    public function show()
    {
        $productos = Productos::all();
        $marcas = marcas::all();
        $tipos = Tipoproducto::all();
        return view('admin/adminProductos',compact('marcas','tipos','productos'));
    }
    public function store()
    {
        $this->validate(request(), [
        'nombre' => 'required|max:100|unique:marcas', 
        'descripcion' => 'required',
        'precio' => 'required|numeric',
        'talla' => 'required',
        'stock' => 'required|numeric',
        'marca' => 'required',
        'tipo' => 'required',
        'imagen' => 'required',

        ]);
        Productos::create(request()->all());
        return redirect('admin/adminProductos')->with('añadido','Producto añadido correctamente.');
    }
    public function destroy($id)
    {
        $pedidos = Pedidos::all();
        foreach ($pedidos as $p) {
            if ($p->id_producto == $id) {
                return redirect('admin/adminProductos')->with('error','No puedes eliminar un producto que ha sido comprado.');
            }
        }
        $productos = Productos::find($id);
        $productos->delete();
        return redirect('admin/adminProductos')->with('hecho','Producto eliminado correctamente.');
    }
    public function edit($id){
        $producto = DB::table('productos')->where('id','=',$id)->get();
        $marcas = marcas::all();
        $tipos = Tipoproducto::all();
        return view('admin/modificarProducto', compact('producto','marcas','tipos'));
    }
    public function update()
    {
        $data = request()->all();
        //$productos = DB::table('users')->where('id','<>',$data['id'])->get();
        $prod = Productos::find($data['id']);
        $prod->nombre = $data['nombre'];
        $prod->descripcion = $data['descripcion'];
        $prod->precio = $data['precio'];
        $prod->talla = $data['talla'];
        $prod->stock = $data['stock'];
        $prod->marca = $data['marca'];
        $prod->tipo = $data['tipo'];
        $prod->imagen = $data['imagen'];
        $prod->save();
        return redirect('admin/adminProductos')->with('añadido','Producto modificado correctamente.');
    }
}
