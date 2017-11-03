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
            $table->integer('codCarFun')->unsigned();
            $table->boolean('activo')->default(false);
            $table->integer('codPlanF')->unsigned()->nullable();
            $table->integer('horasH')->unsigned()->nullable();
            $table->float('sueldo')->nullable();

            $table->timestamp('fecha_creado')->nullable();
            $table->timestamp('fecha_modificado')->nullable();
            $table->timestamp('fecha_eliminado')->nullable();

            $table->foreign('codRol')->references('codRol')->on('roles');
            $table->foreign('codUsu')->references('codUsu')->on('users');
            $table->foreign('codCarFun')->references('codCarFun')->on('cargo_funcional');
            $table->foreign('codPlanF')->references('codPlanF')->on('auditoria');
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
