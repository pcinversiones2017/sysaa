<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcesoMATable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Proceso_MA', function (Blueprint $table) {
            $table->increments('codProMA');
            $table->longText('nombre');
            $table->longText('riesgo');
            $table->longText('ponderacion');
            $table->string('estado');
            $table->integer('codMacroP')->unsigned();

            $table->timestamp('fecha_creado')->nullable();
            $table->timestamp('fecha_modificado')->nullable();
            $table->timestamp('fecha_eliminado')->nullable();
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
        Schema::dropIfExists('Proceso_MA');
    }
}
