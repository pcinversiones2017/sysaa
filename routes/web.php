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

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

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

Route::group(['prefix' => 'cargofuncional'], function(){
    Route::get('cargo-funcional','CargofuncionalController@listar')->name('cargof.listar');
    Route::get('cargo-funcional-crear','CargofuncionalController@crear')->name('cargof.crear');
    Route::post('cargo-funcional-registrar','CargofuncionalController@registrar')->name('cargof.registrar');
    Route::get('cargo-funcional-editar/{id}','CargofuncionalController@editar')->name('cargof.editar');
    Route::post('cargo-funcional-actualizar','CargofuncionalController@actualizar')->name('cargof.actualizar');
    Route::get('cargo-funcional-eliminar/{id}','CargofuncionalController@eliminar')->name('cargof.eliminar');
});

//Plan
Route::prefix('plan')->group(function () {
    Route::get('crear', 'PlanController@crear');
    Route::post('guardar', 'PlanController@guardar');
    Route::get('listar', 'PlanController@listar');
    Route::get('editar/{codPlanA}', 'PlanController@editar');
    Route::post('actualizar', 'PlanController@actualizar');
});


Route::group(['prefix' => 'macroproceso'], function () {
    Route::get('crear', 'MacroprocesoController@crear')->name('macroproceso.listar');
    Route::get('mostrar/{codMacroP}', 'MacroprocesoController@mostrar')->name('macroproceso.mostrar');
    Route::post('guardar', 'MacroprocesoController@guardar')->name('macroproceso.guardar');
    Route::post('guardar_procesoMA', 'MacroprocesoController@guardar_procesoMA')->name('macroproceso.guardar_procesoMA');
    Route::get('listar', 'MacroprocesoController@listar')->name('macroproceso.listar');
    Route::get('editar/{codMacroP}', 'MacroprocesoController@editar')->name('macroproceso.editar');
    Route::post('actualizar', 'MacroprocesoController@actualizar')->name('macroproceso.actualizar');
});

Route::group(['prefix' => 'procesoma'],function () {
    Route::get('crear', 'ProcesomaController@crear')->name('procesoma.crear');
    Route::get('mostrar/{codProMA}', 'ProcesomaController@mostrar')->name('procesoma.mostrar');
    Route::post('guardar', 'ProcesomaController@guardar')->name('procesoma.guardar');
    Route::get('listar', 'ProcesomaController@listar')->name('procesoma.listar');
    Route::get('editar/{codProMA}', 'ProcesomaController@editar')->name('procesoma.editar');
    Route::post('actualizar', 'ProcesomaController@actualizar')->name('procesoma.actualizar');
});

Route::group(['prefix' => 'subproceso'],function () {
    Route::get('crear', 'SubprocesoController@crear')->name('subproceso.crear');
    Route::get('mostrar/{codSubPro}', 'SubprocesoController@mostrar')->name('subproceso.mostrar');
    Route::post('guardar', 'SubprocesoController@guardar')->name('subproceso.guardar');
    Route::get('listar', 'SubprocesoController@listar')->name('subproceso.listar');
    Route::get('editar/{codSubPro}', 'SubprocesoController@editar')->name('subproceso.editar');
    Route::post('actualizar', 'SubprocesoController@actualizar')->name('subproceso.actualizar');
});

Route::group(['prefix' => 'procedimientosp'],function () {
    Route::get('crear', 'ProcedimientospController@crear')->name('procedimientosp.crear');
    Route::get('mostrar/{codProSP}', 'ProcedimientospController@mostrar')->name('procedimientosp.mostrar');
    Route::post('guardar', 'ProcedimientospController@guardar')->name('procedimientosp.guardar');
    Route::get('listar', 'ProcedimientospController@listar')->name('procedimientosp.listar');
    Route::get('editar/{codProSP}', 'ProcedimientospController@editar')->name('procedimientosp.editar');
    Route::post('actualizar', 'ProcedimientospController@actualizar')->name('procedimientosp.actualizar');
});

Route::group(['prefix' => 'actividad'],function () {
    Route::get('crear', 'ActividadController@crear')->name('actividad.crear');
    Route::get('mostrar/{codAct}', 'ActividadController@mostrar')->name('actividad.mostrar');
    Route::post('guardar', 'ActividadController@guardar')->name('actividad.guardar');
    Route::get('listar', 'ActividadController@listar')->name('actividad.listar');
    Route::get('editar/{codAct}', 'ActividadController@editar')->name('actividad.editar');
    Route::post('actualizar', 'ActividadController@actualizar')->name('actividad.actualizar');
});

Route::group(['prefix' => 'tipo_normativa'],function () {
    Route::get('crear', 'TipoNormativaController@crear')->name('tipo_normativa.crear');
    Route::post('guardar', 'TipoNormativaController@guardar')->name('tipo_normativa.guardar');
    Route::get('listar', 'TipoNormativaController@listar')->name('tipo_normativa.listar');
    Route::get('editar/{codTipNorm}', 'TipoNormativaController@editar')->name('tipo_normativa.editar');
    Route::post('actualizar', 'TipoNormativaController@actualizar')->name('tipo_normativa.actualizar');
});
Route::prefix('actividad')->group(function () {
    Route::get('crear', 'ActividadController@crear');
    Route::post('guardar', 'ActividadController@guardar');
    Route::get('listar', 'ActividadController@listar');
    Route::get('editar/{codAct}', 'ActividadController@editar');
    Route::post('actualizar', 'ActividadController@actualizar');
});
//cronograma
Route::group(['prefix' => 'cronograma'], function(){
     Route::get('crear', 'CronogramaController@crear')->name('cronograma.crear');
     Route::post('guardar', 'CronogramaController@guardar')->name('cronograma.guardar');
    Route::post('actualizar', 'CronogramaController@actualizar')->name('cronograma.actualizar');
     Route::get('listar', 'CronogramaController@listar')->name('cronograma.listar');
    Route::get('mostrar/{codPlanF}', 'CronogramaController@mostrar')->name('cronograma.mostrar');
     Route::get('editar/{codPlanF}','CronogramaController@editar')->name('cronograma.editar');
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

//Objetivo Especifico
Route::prefix('objetivo-especifico')->group(function (){
   Route::post('guardar', 'ObjetivoEspecificoController@guardar');

});