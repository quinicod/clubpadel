<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->engine="InnoDB"; 
            $table->increments('id');
            $table->string('nombre');
            $table->string('descripcion');
            $table->float('precio',8,2);
            $table->string('talla');
            $table->integer('stock');
            $table->string('marca');
            $table->foreign('marca')->references('nombre')->on('marcas');
            $table->string('tipo');
            $table->foreign('tipo')->references('nombre')->on('tipoproductos'); 
            $table->string('imagen')->nullable();
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
        Schema::dropIfExists('productos');
    }
}
