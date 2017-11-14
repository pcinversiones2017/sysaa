<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcedimientoSPTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Procedimiento_SP', function (Blueprint $table) {
            $table->increments('codProSP');
            $table->text('nombre');
            $table->text('riesgo')->nullable();
            $table->string('ponderacion')->nullable();
            $table->integer('codSubPro')->unsigned();

            $table->timestamp('fecha_creado')->nullable();
            $table->timestamp('fecha_modificado')->nullable();
            $table->timestamp('fecha_eliminado')->nullable();
            $table->foreign('codSubPro')->references('codSubPro')->on('SubProceso');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Procedimiento_SP');
    }
}
