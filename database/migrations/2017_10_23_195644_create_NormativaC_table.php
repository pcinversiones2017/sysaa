<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNormativaCTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Normativa', function (Blueprint $table) {
            $table->increments('codNorm');
            $table->string('tipoNormativa');
            $table->string('nombre');
            $table->string('numero');
            $table->date('fecha');
            $table->integer('codTipNorm')->unsigned();
            $table->integer('codMacroP')->unsigned()->nullable();

            $table->timestamp('fecha_creado')->nullable();
            $table->timestamp('fecha_modificado')->nullable();
            $table->timestamp('fecha_eliminado')->nullable();
            $table->foreign('codTipNorm')->references('codTipNorm')->on('Tipo_Normativa');
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
        Schema::dropIfExists('Normativa_C');
    }
}
