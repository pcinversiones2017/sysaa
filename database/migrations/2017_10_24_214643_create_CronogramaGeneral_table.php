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
        Schema::create('Cronograma_General', function (Blueprint $table) {
            $table->increments('codCroGen');
            $table->integer('codEtp')->unsigned();
            $table->date('fecha_ini')->nullable();
            $table->date('fecha_Fin')->nullable();
            $table->integer('codPlanF')->unsigned();
            $table->integer('dias_habiles')->nullable();

            $table->timestamp('fecha_creado')->nullable();
            $table->timestamp('fecha_modificado')->nullable();
            $table->timestamp('fecha_eliminado')->nullable();
            $table->foreign('codPlanf')->references('codPlanf')->on('Auditoria');
            $table->foreign('codEtp')->references('codEtp')->on('Etapa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Cronograma_General');
    }
}
