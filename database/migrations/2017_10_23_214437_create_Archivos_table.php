<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArchivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Archivos', function (Blueprint $table) {
            $table->increments('codArc');
            $table->longText('nombre');
            $table->longText('ruta');
            $table->integer('codDes')->unsigned()->nullable();
            $table->integer('codObs')->unsigned()->nullable();
            $table->integer('codSeg')->unsigned()->nullable();
            $table->timestamp('fecha_creado')->nullable();
            $table->timestamp('fecha_modificado')->nullable();
            $table->timestamp('fecha_eliminado')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Archivos');
    }
}
