<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMacroprocesoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Macroproceso', function (Blueprint $table) {
            $table->increments('codMacroP');
            $table->string('nombre');
            $table->string('estado');
            $table->integer('codPlanF')->unsigned();
            $table->timestamp('fecha_creado')->nullable();
            $table->timestamp('fecha_modificado')->nullable();
            $table->foreign('codPlanF')->references('codPlanF')->on('Auditoria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Macroproceso');
    }
}
