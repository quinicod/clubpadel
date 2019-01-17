<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productos;
use App\Tipoproducto;
use App\marcas;
use App\carrito;
use Illuminate\Support\Facades\Input;


class tiendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_usuario=0;
        if (auth()->check()) {
            $id_usuario=auth()->user()->id;
        }   
        $elementos= Productos::latest()->paginate(6);
        $elementoss= Productos::all();
        $marcas= marcas::all();
        $tipos= Tipoproducto::all();
        $carrito = carrito::all();

        return view('tienda', compact('elementos','marcas','tipos','elementoss','carrito','id_usuario'));
    }
    public function filtroMarcas($nombre)
    {
        $id_usuario=0;
        if (auth()->check()) {
            $id_usuario=auth()->user()->id;
        }    
        $marcas= marcas::all();
        $tipos= Tipoproducto::all();
        $elementos= Productos::where('marca','=',$nombre)->paginate(6);
        $elementoss= Productos::all();
        $carrito = carrito::all();

        return view('tienda', compact('elementos','marcas','tipos','elementoss','carrito','id_usuario'));
    }
    public function filtroTipos($nombre)
    {
        $id_usuario=0;
        if (auth()->check()) {
            $id_usuario=auth()->user()->id;
        }    
        $marcas= marcas::all();
        $tipos= Tipoproducto::all();
        $elementos= Productos::where('tipo','=',$nombre)->paginate(6);
        $elementoss= Productos::all();
        $carrito = carrito::all();

        return view('tienda', compact('elementos','marcas','tipos','elementoss','carrito','id_usuario'));
    }
    public function buscar(Request $request)
    {
        $id_usuario=0;
        if (auth()->check()) {
            $id_usuario=auth()->user()->id;
        }    
        $elementos= Productos::where('nombre', 'like', '%'.Input::Get('search').'%')
            ->orWhere('descripcion', 'like', '%'.Input::get('search').'%')->paginate(6);
           /* $elementos = Productos::find($request->nombre);*/
            
        /*$elementos = Productos::search(Input::get('search'));*/
        $elementoss= Productos::all();
        $marcas= marcas::all();
        $tipos= Tipoproducto::all();
        $carrito = carrito::all();

        return view('tienda', compact('elementos','marcas','tipos','elementoss','carrito','id_usuario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
