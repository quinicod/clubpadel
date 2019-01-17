<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->engine="InnoDB"; 
            $table->Integer('id_compra')->unsigned();
            $table->foreign('id_compra')->references('id')->on('compras')->onDelete("cascade");
            $table->Integer('id_producto')->unsigned(); 
            $table->foreign('id_producto')->references('id')->on('productos')->onDelete("cascade");
            $table->integer('unidades');
            $table->primary(['id_compra','id_producto']);
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
