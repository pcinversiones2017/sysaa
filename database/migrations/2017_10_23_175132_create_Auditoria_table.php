<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuditoriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Auditoria', function (Blueprint $table) {
            $table->increments('codPlanF');
            $table->string('nombrePlanF');
            $table->date('fechaIniPlanF');
            $table->date('fechaFinPlanF');
            $table->date('periodoIniPlanF');
            $table->date('periodoFinPlanF');
            $table->string('estadoAuditoria');
            $table->integer('codPlanA')->unsigned();
            $table->integer('codObjGen')->unsigned();
            $table->timestamp('fecha_creado')->nullable();
            $table->timestamp('fecha_modificado')->nullable();
            $table->foreign('codPlanA')->references('codPlanA')->on('PlanAnual');
            $table->foreign('codObjGen')->references('codObjGen')->on('ObjetivoGeneral');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Auditoria');
    }
}
