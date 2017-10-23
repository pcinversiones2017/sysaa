<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCronogramaGeneralTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CronogramaGeneral', function (Blueprint $table) {
            $table->increments('codCroGen');
            $table->string('etapa');
            $table->date('fechaIni');
            $table->date('fechaFin');
            $table->integer('codPlanf')->unsigned();
            $table->timestamp('fecha_creado')->nullable();
            $table->timestamp('fecha_modificado')->nullable();
            $table->foreign('codPlanf')->references('codPlanf')->on('Auditoria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('CronogramaGeneral');
    }
}
