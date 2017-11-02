<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcedimientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Procedimiento', function (Blueprint $table) {
            $table->increments('codProc');
            $table->text('justificacion');
            $table->text('detalle');
            $table->date('fechafin');
            $table->integer('codObjEsp')->unsigned()->nullable();
            $table->integer('codObjGen')->unsigned()->nullable();
            $table->integer('codUsuRol');
            $table->boolean('eliminado')->default(true);
            $table->timestamp('fecha_creado')->nullable();
            $table->timestamp('fecha_modificado')->nullable();
            $table->foreign('codObjEsp')->references('codObjEsp')->on('Objetivo_Especifico');
            $table->foreign('codObjGen')->references('codObjGen')->on('Objetivo_General');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Procedimiento');
    }
}
