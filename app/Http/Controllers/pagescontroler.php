<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Pistas;
use App\Alquila;
use App\Horas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class pagescontroler extends Controller
{
    
     public function index(){
        return view('index');
    }
    public function instalaciones(){
        return view('instalaciones');
    }
    public function tienda(){
        return view('tienda');
    }
    public function admin(){
        return view('admin.index');// esto esta de prueba para cada pagina pero lo que hay que poner aqui es la pagina index del admin aun por decidir
    }

}
