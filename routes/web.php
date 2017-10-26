<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('test', 'TestController@test');
Route::get('planificacion', 'PlanificacionController@index');

Route::group(['prefix' => 'usuario'], function(){
    Route::get('usuario','UsuarioController@listar')->name('usuario.listar');
    Route::get('usuario-crear','UsuarioController@crear')->name('usuario.crear');
    Route::post('usuario-registrar','UsuarioController@registrar')->name('usuario.registrar');
    Route::get('usuario-editar/{id}','UsuarioController@editar')->name('usuario.editar');
    Route::post('usuario-actualizar','UsuarioController@actualizar')->name('usuario.actualizar');
    Route::get('usuario-eliminar/{id}','UsuarioController@eliminar')->name('usuario.eliminar');
});

//Plan
Route::prefix('plan')->group(function () {
    Route::get('crear', 'PlanController@crear');
    Route::post('guardar', 'PlanController@guardar');
    Route::get('listar', 'PlanController@listar');
    Route::get('editar/{codPlanA}', 'PlanController@editar');
    Route::post('actualizar', 'PlanController@actualizar');
});

//Plan
Route::prefix('macroproceso')->group(function () {
    Route::get('crear', 'MacroprocesoController@crear');
    Route::post('guardar', 'MacroprocesoController@guardar');
    Route::get('listar', 'MacroprocesoController@listar');
    Route::get('editar/{codMacroP}', 'MacroprocesoController@editar');
    Route::post('actualizar', 'MacroprocesoController@actualizar');
});
//Plan
Route::prefix('procesoma')->group(function () {
    Route::get('crear', 'ProcesomaController@crear');
    Route::post('guardar', 'ProcesomaController@guardar');
    Route::get('listar', 'ProcesomaController@listar');
    Route::get('editar/{codProMA}', 'ProcesomaController@editar');
    Route::post('actualizar', 'ProcesomaController@actualizar');
});

Route::prefix('tipo_normativa')->group(function () {
    Route::get('crear', 'TipoNormativaController@crear');
    Route::post('guardar', 'TipoNormativaController@guardar');
    Route::get('listar', 'TipoNormativaController@listar');
    Route::get('editar/{codTipNorm}', 'TipoNormativaController@editar');
    Route::post('actualizar', 'TipoNormativaController@actualizar');
});
Route::prefix('actividad')->group(function () {
    Route::get('crear', 'ActividadController@crear');
    Route::post('guardar', 'ActividadController@guardar');
    Route::get('listar', 'ActividadController@listar');
    Route::get('editar/{codAct}', 'ActividadController@editar');
    Route::post('actualizar', 'ActividadController@actualizar');
});
//cronograma
Route::prefix('cronograma')->group(function () {
     Route::get('crear', 'CronogramaController@crear');
     Route::post('guardar', 'CronogramaController@guardar');
     Route::get('listar', 'CronogramaController@listar');
    Route::get('mostrar/{codPlanF}', 'CronogramaController@mostrar');
     Route::get('editar/{cod}','CronogramaController@test');
});
//Auditoria
Route::prefix('auditoria')->group(function (){

   Route::get('crear', 'AuditoriaController@crear');
   Route::get('mostrar/{codPlanF}', 'AuditoriaController@mostrar');
   Route::post('guardar', 'AuditoriaController@guardar');
   Route::get('listar', 'AuditoriaController@listar');
   Route::get('editar/{codPlanF}', 'AuditoriaController@editar');
   Route::post('actualizar', 'PlanController@actualizar');
});
//Objetivo General

Route::prefix('objetivo-general')->group(function (){

    Route::post('guardar', 'ObjetivoGeneralController@guardar');
});