<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Usuario_Roles', function (Blueprint $table) {
            $table->increments('codUsuRol');
            $table->integer('codUsu')->unsigned();
            $table->integer('codRol')->unsigned();
            $table->integer('codPlanF')->unsigned();
            $table->timestamp('fecha_creado')->nullable();
            $table->timestamp('fecha_modificado')->nullable(); 

            $table->foreign('codRol')->references('codRol')->on('Roles');
            $table->foreign('codUsu')->references('codUsu')->on('Usuarios');
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
        Schema::dropIfExists('Usuario_Roles');
    }
}
