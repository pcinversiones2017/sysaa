<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubProcesoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SubProceso', function (Blueprint $table) {
            $table->increments('codSubPro');
            $table->string('nombre');
            $table->string('estado');
            $table->integer('codProMA')->unsigned();
            $table->boolean('eliminado')->default(false);
            $table->timestamp('fecha_creado')->nullable();
            $table->timestamp('fecha_modificado')->nullable();
            $table->foreign('codProMA')->references('codProMA')->on('Proceso_MA');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('SubProceso');
    }
}
