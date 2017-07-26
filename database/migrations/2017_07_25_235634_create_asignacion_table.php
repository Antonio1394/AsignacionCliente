<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignaciones', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('descripcion');
            $table->date('fecha');
            $table->bigInteger('idUsuario')->unsigned();
            $table->bigInteger('idCliente')->unsigned();
            $table->foreign('idUsuario')->references('id')->on('users');
            $table->foreign('idCliente')->references('id')->on('clientes');
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
        Schema::drop('asignaciones');
    }
}
