<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Actividad', function (Blueprint $table) {
            $table->increments('codAct');
            $table->string('responsable');
            $table->text('nombre');
            $table->integer('codProSP')->unsigned();
            $table->boolean('eliminado')->default(true);
            $table->timestamp('fecha_creado')->nullable();
            $table->timestamp('fecha_modificado')->nullable();
            $table->foreign('codProSP')->references('codProSP')->on('Procedimiento_SP');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Actividad');
    }
}
