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
            $table->integer('codObjEsp')->unsigned();
            $table->integer('codObjGen')->unsigned();
            $table->timestamp('fecha_creado')->nullable();
            $table->timestamp('fecha_modificado')->nullable();
            $table->foreign('codObjEsp')->references('codObjEsp')->on('Objetivo_Especifico')->nullable();
            $table->foreign('codObjGen')->references('codObjGen')->on('Objetivo_General')->nullable();
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
