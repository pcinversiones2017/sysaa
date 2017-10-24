<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNormativaMacroprocesoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Normativa_Macroproceso', function (Blueprint $table) {
            $table->increments('codNormMacro');
            $table->integer('codNorm')->unsigned();
            $table->integer('codMacroP')->unsigned();
            $table->timestamp('fecha_creado')->nullable();
            $table->timestamp('fecha_modificado')->nullable();
            $table->foreign('codNorm')->references('codNorm')->on('Normativa_C');
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
        Schema::dropIfExists('Normativa_Macroproceso');
    }
}
