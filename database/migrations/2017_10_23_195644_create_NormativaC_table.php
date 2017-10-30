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
        Schema::create('Normativa_C', function (Blueprint $table) {
            $table->increments('codNorm');
            $table->string('tipoNormativa');
            $table->string('nombre');
            $table->string('numero');
            $table->date('fecha');
            $table->integer('codTipNorm')->unsigned();
            $table->timestamp('fecha_creado')->nullable();
            $table->timestamp('fecha_modificado')->nullable();
            $table->foreign('codTipNorm')->references('codTipNorm')->on('Tipo_Normativa');
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
