<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Informe', function (Blueprint $table) {
            $table->increments('codInf');
            $table->text('informe');
            $table->date('elaborado');
            $table->date('revisado');
            $table->date('supervisado');
            $table->integer('codProc')->unsigned();
            $table->boolean('eliminado')->default(true);
            $table->timestamp('fecha_creado')->nullable();
            $table->timestamp('fecha_modificado')->nullable();

            $table->foreign('codProc')->references('codProc')->on('Procedimiento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Informe');
    }
}
