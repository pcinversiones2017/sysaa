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



Route::get('test', 'TestController@test');
Route::get('planificacion', 'PlanificacionController@index');

Route::get('login','SesionController@iniciarsesion')->name('login');
Route::post('iniciar-sesion','SesionController@authenticate');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/','InicioController@index')->name('inicio.inicio');
});



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

Route::group(['prefix' => 'asignarrol'], function(){
    Route::get('asignar-rol','AsignacionController@listar')->name('asignarr.listar');
    Route::get('asignar-rol-crear','AsignacionController@crear')->name('asignarr.crear');
    Route::post('asignar-rol-registrar','AsignacionController@registrar')->name('asignarr.registrar');
    Route::get('asignar-rol-editar/{id}','AsignacionController@editar')->name('asignarr.editar');
    Route::post('asignar-rol-actualizar','AsignacionController@actualizar')->name('asignarr.actualizar');
    Route::get('asignar-rol-eliminar/{id}','AsignacionController@eliminar')->name('asignarr.eliminar');
});

//Plan
Route::prefix('plan')->group(function () {
    Route::get('crear', 'PlanController@crear');
    Route::post('guardar', 'PlanController@guardar');
    Route::get('listar', 'PlanController@listar');
    Route::get('editar/{codPlanA}', 'PlanController@editar');
    Route::post('actualizar', 'PlanController@actualizar');
});


Route::prefix('macroproceso')->group(function () {
    Route::get('crear', 'MacroprocesoController@crear');
    Route::get('mostrar/{codMacroP}', 'MacroprocesoController@mostrar');
    Route::post('guardar', 'MacroprocesoController@guardar');
    Route::post('guardar_procesoMA', 'MacroprocesoController@guardar_procesoMA');
    Route::get('listar', 'MacroprocesoController@listar');
    Route::get('editar/{codMacroP}', 'MacroprocesoController@editar');
    Route::post('actualizar', 'MacroprocesoController@actualizar');
});

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



Route::get('/home', 'HomeController@index')->name('home');

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');