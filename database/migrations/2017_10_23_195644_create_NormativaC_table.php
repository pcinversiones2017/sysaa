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
        Schema::create('NormativaC', function (Blueprint $table) {
            $table->increments('codNorm');
            $table->string('nombre');
            $table->string('numero');
            $table->string('fecha');
            $table->integer('codTipNorm')->unsigned();
            $table->timestamp('fecha_creado')->nullable();
            $table->timestamp('fecha_modificado')->nullable();
            $table->foreign('codTipNorm')->references('codTipNorm')->on('TipoNormativa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('NormativaC');
    }
}
