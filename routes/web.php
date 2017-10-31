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

Route::get('login', ['as' => 'login', 'uses' => 'LoginController@login']);
Route::post('iniciar-sesion', 'LoginController@authenticate');


//Route::get('login','SesionController@iniciarsesion')->name('login');
//Route::post('iniciar-sesion','SesionController@authenticate');

Route::group(['middleware' => 'auth'], function(){
    Route::get('inicio','InicioController@index')->name('inicio.inicio');
});

Route::group(['prefix' => 'archivo'], function(){
    Route::get('archivo-crear/{codInf}','ArchivoController@crear')->name('archivo.crear');
    Route::post('archivo-registrar','ArchivoController@registrar')->name('archivo.registrar');
    Route::get('listar','ArchivoController@listar')->name('archivo.listar');
    //Route::get('archivo-crear','ArchivoController@crear')->name('archivo.crear');
    Route::get('archivo-eliminar/{id}','ArchivoController@eliminar')->name('archivo.eliminar');
    Route::get('archivo-descargar/{id}','ArchivoController@descargar')->name('archivo.descargar');
});

Route::group(['prefix' => 'informe'], function(){
    Route::get('informe','InformeController@listar')->name('informe.listar');
    Route::get('informe-crear','InformeController@crear')->name('informe.crear');
    Route::post('informe-registrar','InformeController@registrar')->name('informe.registrar');
    Route::get('informe-editar/{id}','InformeController@editar')->name('informe.editar');
    Route::post('informe-actualizar','InformeController@actualizar')->name('informe.actualizar');
    Route::get('informe-eliminar/{id}','InformeController@eliminar')->name('informe.eliminar');
});

Route::group(['prefix' => 'usuario'], function(){
    Route::get('usuario','UsuarioController@listar')->name('usuario.listar');
    Route::get('usuario-crear','UsuarioController@crear')->name('usuario.crear');
    Route::post('usuario-registrar','UsuarioController@registrar')->name('usuario.registrar');
    Route::get('usuario-editar/{id}','UsuarioController@editar')->name('usuario.editar');
    Route::post('usuario-actualizar','UsuarioController@actualizar')->name('usuario.actualizar');
    Route::get('usuario-eliminar/{id}','UsuarioController@eliminar')->name('usuario.eliminar');
});

Route::group(['prefix' => 'permiso'], function(){
    Route::get('permiso/{id}','PermisoController@autorizar')->name('permiso.autorizar');
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
Route::group(['prefix' => 'plan'], function () {
    Route::get('crear', 'PlanController@crear')->name('plan.crear');
    Route::post('guardar', 'PlanController@guardar')->name('plan.guardar');
    Route::get('listar', 'PlanController@listar')->name('plan.listar');
    Route::get('editar/{codPlanA}', 'PlanController@editar')->name('plan.editar');
    Route::post('actualizar', 'PlanController@actualizar')->name('plan.actualizar');
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
//normaAuditoria
Route::group(['prefix' => 'normaAuditoria'], function(){
    Route::get('listar', 'NormaAuditoriaController@listar')->name('normaAuditoria.listar');
    Route::get('listarAplica', 'NormaAuditoriaController@listarAplica')->name('normaAuditoria.listarAplica');
    Route::get('crear', 'NormaAuditoriaController@crear')->name('normaAuditoria.crear');
    Route::post('guardar', 'NormaAuditoriaController@guardar')->name('normaAuditoria.guardar');
    Route::get('editar/{codNormMacro}', 'NormaAuditoriaController@editar')->name('normaAuditoria.editar');
    Route::post('actualizar', 'NormaAuditoriaController@actualizar')->name('normaAuditoria.actualizar');
    Route::get('archivocrear/{codNormMacro}', 'NormaAuditoriaController@archivocrear')->name('normaAuditoria.archivocrear');
    Route::post('archivoregistrar', 'NormaAuditoriaController@archivoregistrar')->name('normaAuditoria.archivoregistrar');

});
//Auditoria
Route::group(['prefix' => 'auditoria'], function (){

   Route::get('crear', 'AuditoriaController@crear')->name('auditoria.crear');
   Route::get('mostrar/{codPlanF}', 'AuditoriaController@mostrar')->name('auditoria.mostrar');
   Route::post('guardar', 'AuditoriaController@guardar')->name('auditoria.guardar');
   Route::get('listar', 'AuditoriaController@listar')->name('auditoria.listar');
   Route::get('editar/{codPlanF}', 'AuditoriaController@editar')->name('auditoria.editar');
   Route::post('actualizar', 'AuditoriaController@actualizar')->name('auditoria.actualizar');

});
//Institucion
Route::group(['prefix' => 'institucion'], function (){


    Route::get('listar', 'InstitucionController@listar')->name('institucion.listar');
    Route::get('editar/{codInstitucion}', 'InstitucionController@editar')->name('institucion.editar');
    Route::post('actualizar', 'InstitucionController@actualizar')->name('institucion.actualizar');
    Route::get('listarSoftware', 'InstitucionController@listarSoftware')->name('institucion.listarSoftware');



});



//Objetivo General

Route::prefix('objetivo-general')->group(function (){

    Route::post('guardar', 'ObjetivoGeneralController@guardar')->name('objetivogen.guardar');
});

//Objetivo Especifico
Route::prefix('objetivo-especifico')->group(function (){

   Route::post('guardar', 'ObjetivoEspecificoController@guardar')->name('objetivo-especifico.guardar');
   Route::get('mostrar/{codObjEsp}', 'ObjetivoEspecificoController@mostrar')->name('objetivo-especifico.mostrar');
   Route::post('actualizar', 'ObjetivoEspecificoConotroller@actualizar')->name('objetivo-especifico.actualizar');
});



Route::get('/home', 'HomeController@index')->name('home');

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');