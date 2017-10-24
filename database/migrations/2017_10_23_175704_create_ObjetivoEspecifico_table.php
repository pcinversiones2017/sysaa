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
            $table->increments('codObjEsp');
            $table->string('nombre');
            $table->string('materia');
            $table->integer('codObjGen')->unsigned();
            $table->integer('codMacroP')->unsigned();
            $table->timestamp('fecha_creado')->nullable();
            $table->timestamp('fecha_modificado')->nullable();
            $table->foreign('codObjGen')->references('codObjGen')->on('ObjetivoGeneral');
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
        Schema::dropIfExists('ObjetivoEspecifico');
    }
}
