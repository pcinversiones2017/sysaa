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
            $table->string('nombre');
            $table->integer('codInf')->unsigned()->nullable();
            $table->boolean('estado')->default(true);
            $table->timestamp('fecha_creado')->nullable();
            $table->timestamp('fecha_modificado')->nullable();
            $table->foreign('codInf')->references('codInf')->on('Informe');
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
