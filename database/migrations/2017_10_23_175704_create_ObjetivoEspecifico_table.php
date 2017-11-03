<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObjetivoEspecificoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Objetivo_Especifico', function (Blueprint $table) {
            $table->increments('codObjEsp')->unsigned();
            $table->text('nombre');
            $table->string('materia');
            $table->integer('codObjGen')->unsigned();
            $table->integer('codMacroP')->unsigned();

            $table->timestamp('fecha_creado')->nullable();
            $table->timestamp('fecha_modificado')->nullable();
            $table->timestamp('fecha_eliminado')->nullable();
            $table->foreign('codObjGen')->references('codObjGen')->on('Objetivo_General');
            $table->foreign('codMacroP')->references('codMacroP')->on('Macroproceso');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Objetivo_Especifico');
    }
}
