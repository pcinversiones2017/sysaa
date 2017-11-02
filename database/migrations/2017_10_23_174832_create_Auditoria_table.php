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
            $table->string('codigoServicioCP')->comment('codigo del servicio de control posterior');;
            $table->string('tipoServicioCP')->comment('tipo de servicio de control posterior');;
            $table->string('organoCI')->comment('organo de control interno');
            $table->text('origen')->nullable();;
            $table->string('entidadAuditada');
            $table->string('tipoDemanda')->nullable();
            $table->date('fechaIniPlanF')->nullable();
            $table->date('fechaFinPlanF')->nullable();
            $table->date('periodoIniPlanF')->nullable();
            $table->date('periodoFinPlanF')->nullable();
            $table->string('estadoAuditoria');
            $table->integer('codPlanA')->unsigned();
            $table->boolean('eliminado')->default(false);
            $table->timestamp('fecha_creado')->nullable();
            $table->timestamp('fecha_modificado')->nullable();
            $table->foreign('codPlanA')->references('codPlanA')->on('Plan_Anual');
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
