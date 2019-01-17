<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlquilasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('alquilas', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users')->onDelete("cascade");
            $table->integer('id_pista')->unsigned();
            $table->foreign('id_pista')->references('id')->on('pistas');
            $table->date('fecha');
            $table->integer('id_hora')->unsigned();
            $table->foreign('id_hora')->references('id')->on('horas');
            $table->primary(['id_user','id_pista','fecha','id_hora']);
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
        Schema::dropIfExists('alquilas');
    }
}
