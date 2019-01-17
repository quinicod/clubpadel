<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\marcas;
use App\Productos;
use App\Tipoproducto;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class admincontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showEliminar()
    {
        $usuarios= User::all();

        return view('admin/eliminarUser', compact('usuarios'));
    }
    public function showModificar()
    {
        $usuarios= User::all();

        return view('admin/modificarUser', compact('usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
    //
    }

   /* public function storeProductos(){
        $this->validate(request(), [
        'name' => 'required|max:100|unique:forums', // forums es la tabla dónde debe ser único
        'description' => 'required|max:500',
        ]);


        Productos::create(request()->all());
        return back()->with('message', ['success', __("Foro creado correctamente")]);
    }*/

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
