<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productos;
use App\User;
use App\Carrito;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CarritoController extends Controller
{
	public function show()
	{
		$productos = Productos::all();
		$idUsuario = Auth::id();
		$carritos = DB::table('carritos')->where('id_user','=',$idUsuario)->get();


		$carro = DB::table('carritos')->where('id_user','=',$idUsuario)->get();
    	$total = 0;
    	foreach ($carro as $c) {
    		$producto = Productos::find($c->id_producto);
    		$total += $c->cantidad*$producto['precio'];
    	}

    	//return redirect('carrito')->with('total',$total);
		return view('carrito', compact('carritos','productos','total'));
	}

    public function store($id)
    {
		$idUsuario = Auth::id();
		$producto = Productos::find($id);
    	$carrito = DB::table('carritos')->where('id_user','=',$idUsuario)->get();
    	
    	if ($producto->stock >= 1) {
	    	foreach ($carrito as $c) {
	    		if ($c->id_producto == $id){
	    			return redirect('tienda')->with('errorDuplicado','El producto ya esta añadido al carrito');
	    		}
	    	}
	    	$inserccion=DB::table('carritos')->insert(
	    		[
					'id_producto' => $id,
	    			'id_user' => $idUsuario,
	    			'cantidad' => 1,
	    		]);
	    	$stock = $producto->stock-1;
			$prod = DB::table('productos')->where('id','=',$id)->update(['stock' => $stock]);
	    }
	    else{
	    	return redirect('tienda')->with('errorDuplicado','Lo sentimos, no disponemos de stock de este producto.');
	    }
    	return redirect('tienda')->with('errorDuplicado','Añadido a la cesta');
    }

    public function eliminarRegistro($id)
    {
    	$productos = Productos::find($id);
		$idUsuario = Auth::id();
		$cantidad = DB::table('carritos')->where('id_user','=',$idUsuario)->where('id_producto','=',$id)->get();
		$carritos = DB::table('carritos')->where('id_user','=',$idUsuario)->where('id_producto','=',$id)->delete();
		//Volver a añadir el stock
		foreach ($cantidad as $c) {
			$stock = $productos['stock']+$c->cantidad;
			$prod = DB::table('productos')->where('id','=',$id)->update(['stock' => $stock]);
		}
		//devolver el total
    	$carro = DB::table('carritos')->where('id_user','=',$idUsuario)->get();
    	$total = 0;
    	foreach ($carro as $c) {
    		$producto = Productos::find($c->id_producto);
    		$total += $c->cantidad*$producto['precio'];
    	}

    	return redirect('carrito')->with('total',$total);
    }

    public function addCantidad($id)
    {
    	$productos = Productos::find($id);
		$idUsuario = Auth::id();
		$carritos = DB::table('carritos')->where('id_user','=',$idUsuario)->where('id_producto','=',$id)->get();
		//Si no hay mas stock de ese producto no añade mas y da error sino lo añade
		if ($productos['stock'] == 0) {
				return redirect('carrito')->with('errorStock','No disponemos de mas stock, lo sentimos');
		}
		foreach ($carritos as $c) {
				$suma = $c->cantidad+1;
				$carrit = DB::table('carritos')->where('id_user','=',$idUsuario)->where('id_producto','=',$id)->update(['cantidad' => $suma]);
				$stock = $productos['stock']-1;
				$prod = DB::table('productos')->where('id','=',$id)->update(['stock' => $stock]);

		}
		//devolveer el total
		$carro = DB::table('carritos')->where('id_user','=',$idUsuario)->get();
    	$total = 0;
    	foreach ($carro as $c) {
    		$producto = Productos::find($c->id_producto);
    		$total += $c->cantidad*$producto['precio'];
    	}

    	return redirect('carrito')->with('total',$total);

    }

    public function quitCantidad($id)
    {
		$productos = Productos::find($id);
		$idUsuario = Auth::id();
		$carritos = DB::table('carritos')->where('id_user','=',$idUsuario)->where('id_producto','=',$id)->get();
		//Si se le resta y solo tiene una unidad en el carro se elimina ese producto
		foreach ($carritos as $c) {
			if ($c->cantidad-1 == 0){
				$idUsuario = Auth::id();
				$carritos = DB::table('carritos')->where('id_user','=',$idUsuario)->where('id_producto','=',$id)->delete();
				$stock = $productos['stock']+1;
				$prod = DB::table('productos')->where('id','=',$id)->update(['stock' => $stock]);
			}
			//Si el producto tiene mas de uno se le resta
			else{
				$resta = $c->cantidad-1;
				$carrit = DB::table('carritos')->where('id_user','=',$idUsuario)->where('id_producto','=',$id)->update(['cantidad' => $resta]);

				$stock = $productos['stock']+1;
				$prod = DB::table('productos')->where('id','=',$id)->update(['stock' => $stock]);
			}

		}
		//devolver el total
		$carro = DB::table('carritos')->where('id_user','=',$idUsuario)->get();
    	$total = 0;
    	foreach ($carro as $c) {
    		$producto = Productos::find($c->id_producto);
    		$total += $c->cantidad*$producto['precio'];
    	}

    	return redirect('carrito')->with('total',$total);
    }
    public function comprar($total)
    {
    	$now = new \DateTime();
    	$fecha = $now->format('Y-m-d');
    	$idUsuario = Auth::id();
    	$user = User::find($idUsuario);
    	$prodCarrito = DB::table('carritos')->where('id_user','=',$idUsuario)->get();
    	if ($total > 0){
	    	if ($total > 50){
	    		if ($user['saldo'] >= $total){
	    			$idCompra = DB::table('compras')->insertGetId(
				    		[
								'fecha' => $fecha,
				    			'id_user' => $idUsuario,
				    			'precio_total' => $total,
				    		]);
	    			foreach ($prodCarrito as $pc) {
    					DB::table('pedidos')->insert(
				    		[
								'id_compra' => $idCompra,
				    			'id_producto' => $pc->id_producto,
				    			'unidades' => $pc->cantidad,
				    		]);
    					DB::table('carritos')->where('id_producto','=',$pc->id_producto)->where('id_user','=',$pc->id_user)->delete();
    				}
					$newSaldo = $user['saldo']-($total);
    				$u = DB::table('users')->where('id','=',$idUsuario)->update(['saldo' => $newSaldo]);
	    		}
	    		else{
	    			return redirect('carrito')->with('errorSaldo','No dispones de saldo suficiente en este momento.');
	    		}
	    	}
	    	else{
	    		if ($user['saldo'] >= ($total+5.95)){
	    			$idCompra = DB::table('compras')->insertGetId(
				    		[
								'fecha' => $fecha,
				    			'id_user' => $idUsuario,
				    			'precio_total' => $total+5.95,
				    		]);
	    			foreach ($prodCarrito as $pc) {
    					DB::table('pedidos')->insert(
				    		[
								'id_compra' => $idCompra,
				    			'id_producto' => $pc->id_producto,
				    			'unidades' => $pc->cantidad,
				    		]);
    					DB::table('carritos')->where('id_producto','=',$pc->id_producto)->where('id_user','=',$pc->id_user)->delete();
    				}
    				$newSaldo = $user['saldo']-($total+5.95);
    				$u = DB::table('users')->where('id','=',$idUsuario)->update(['saldo' => $newSaldo]);
	    		}
	    		else{
	    			return redirect('carrito')->with('errorSaldo','No dispones de saldo suficiente en este momento.');
	    		}
	    	}
	    }

	    return redirect('carrito')->with('correcto','Compra realizada con éxito.');
    }

}
//Comprobar antes de realizar la compra el stock disponible de cada uno ya que el carro deja los registros guardados