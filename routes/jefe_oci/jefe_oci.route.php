<?php

Route::group(['middleware' => ['auth','jefe_oci']], function(){

    Route::group(['prefix' => 'procedimiento'], function(){
        Route::get('procedimiento-crear/{codPlanF}/{codObjEsp}','ProcedimientoController@crear')->name('procedimiento.crear');
        Route::post('procedimiento-registrar','ProcedimientoController@registrar')->name('procedimiento.registrar');
        Route::get('listar','ProcedimientoController@listar')->name('procedimiento.listar');
        Route::get('procedimiento-editar/{codPlanF}/{codObjEsp}/{codProc}','ProcedimientoController@editar')->name('procedimiento.listar');
        Route::post('procedimiento-actualizar','ProcedimientoController@actualizar')->name('procedimiento.actualizar');
        Route::get('procedimiento-crear','ProcedimientoController@crear')->name('procedimiento.crear');
        Route::get('procedimiento-eliminar/{codProc}','ProcedimientoController@eliminar')->name('procedimiento.eliminar');
        Route::get('procedimiento-descargar/{id}','ProcedimientoController@descargar')->name('procedimiento.descargar');
        Route::get('crear-general/{codObjGen}', 'ProcedimientoController@crear')->name('procedimiento.crear.general');
    });

    Route::group(['prefix' => 'procedimiento-general', 'namespace' => 'Jefe_OCI'], function(){
        Route::get('crear/{codPlanF}', 'ProcedimientoController@crear')->name('procedimiento-general.crear');
        Route::post('registrar', 'ProcedimientoController@registrar')->name('procedimiento-general.registrar');
        Route::get('editar/{codPlanF}/{codProc}', 'ProcedimientoController@editar')->name('procedimiento-general.editar');
        Route::post('actualizar', 'ProcedimientoController@actualizar')->name('procedimiento-general.actualizar');
        Route::get('eliminar/{codProc}', 'ProcedimientoController@eliminar')->name('procedimiento-general.eliminar');
    });

    Route::group(['prefix' => 'archivo'], function(){
        Route::get('archivo-crear/{codPlanF}/{codObjEsp}/{codProc}/{codInf}','ArchivoController@crear')->name('archivo.crear');
        Route::post('archivo-registrar','ArchivoController@registrar')->name('archivo.registrar');
        Route::get('listar/{codPlanF}/{codObjEsp}/{codProc}/{codInf}','ArchivoController@listar')->name('archivo.listar');
        Route::get('archivo-crear','ArchivoController@crear')->name('archivo.crear');
        Route::get('archivo-eliminar/{id}','ArchivoController@eliminar')->name('archivo.eliminar');
        Route::get('archivo-descargar/{id}','ArchivoController@descargar')->name('archivo.descargar');
    });

    Route::group(['prefix' => 'usuario'], function(){
        Route::get('usuario','UsuarioController@listar')->name('usuario.listar');
        Route::get('usuario-crear','UsuarioController@crear')->name('usuario.crear');
        Route::post('usuario-registrar','UsuarioController@registrar')->name('usuario.registrar');
        Route::get('usuario-editar/{id}','UsuarioController@editar')->name('usuario.editar');
        Route::post('usuario-actualizar','UsuarioController@actualizar')->name('usuario.actualizar');
        Route::get('usuario-eliminar/{id}','UsuarioController@eliminar')->name('usuario.eliminar');
    });

    Route::group(['prefix' => 'historial'], function(){
        Route::get('historial/{id}','HistorialController@mostrar')->name('historial.buscar');
    });

    Route::group(['prefix' => 'cargofuncional'], function(){
        Route::get('cargo-funcional','CargofuncionalController@listar')->name('cargof.listar');
        Route::get('cargo-funcional-crear','CargofuncionalController@crear')->name('cargof.crear');
        Route::post('cargo-funcional-registrar','CargofuncionalController@registrar')->name('cargof.registrar');
        Route::get('cargo-funcional-editar/{id}','CargofuncionalController@editar')->name('cargof.editar');
        Route::post('cargo-funcional-actualizar','CargofuncionalController@actualizar')->name('cargof.actualizar');
        Route::get('cargo-funcional-eliminar/{id}','CargofuncionalController@eliminar')->name('cargof.eliminar');
    });

    Route::group(['prefix' => 'asignar-rol'], function(){
        Route::get('listar','AsignacionController@listar')->name('asignarr.listar');
        Route::get('crear/{codPlanF}','AsignacionController@crear')->name('asignarr.crear');
        Route::post('asignar-rol-registrar','AsignacionController@registrar')->name('asignarr.registrar');
        Route::get('editar/{codUsuRol}','AsignacionController@editar')->name('asignarr.editar');
        Route::post('asignar-rol-actualizar','AsignacionController@actualizar')->name('asignarr.actualizar');
        Route::get('asignar-rol-eliminar/{codUsuRol}','AsignacionController@eliminar')->name('asignarr.eliminar');
    });

    //Plan
    Route::group(['prefix' => 'plan'], function () {
        Route::get('crear', 'PlanController@crear')->name('plan.crear');
        Route::post('guardar', 'PlanController@guardar')->name('plan.guardar');
        Route::get('listar', 'PlanController@listar')->name('plan.listar');
        Route::get('editar/{codPlanA}', 'PlanController@editar')->name('plan.editar');
        Route::get('eliminar/{codPlanA}', 'PlanController@eliminar')->name('plan.eliminar');
        Route::post('actualizar', 'PlanController@actualizar')->name('plan.actualizar');
    });


    Route::group(['prefix' => 'macroproceso'], function () {
        Route::get('crear', 'MacroprocesoController@crear')->name('macroproceso.crear');
        Route::get('mostrar/{codMacroP}', 'MacroprocesoController@mostrar')->name('macroproceso.mostrar');
        Route::post('guardar', 'MacroprocesoController@guardar')->name('macroproceso.guardar');
        Route::post('guardar_procesoMA', 'MacroprocesoController@guardar_procesoMA')->name('macroproceso.guardar_procesoMA');
        Route::get('listar', 'MacroprocesoController@listar')->name('macroproceso.listar');
        Route::get('editar/{codMacroP}', 'MacroprocesoController@editar')->name('macroproceso.editar');
        Route::post('actualizar', 'MacroprocesoController@actualizar')->name('macroproceso.actualizar');
        Route::get('eliminar/{codMacroP}', 'MacroprocesoController@eliminar')->name('macroproceso.eliminar');
    });

    Route::group(['prefix' => 'procesoma'],function () {
        Route::get('crear', 'ProcesomaController@crear')->name('procesoma.crear');
        Route::get('mostrar/{codProMA}', 'ProcesomaController@mostrar')->name('procesoma.mostrar');
        Route::post('guardar', 'ProcesomaController@guardar')->name('procesoma.guardar');
        Route::get('listar', 'ProcesomaController@listar')->name('procesoma.listar');
        Route::get('editar/{codProMA}', 'ProcesomaController@editar')->name('procesoma.editar');
        Route::post('actualizar', 'ProcesomaController@actualizar')->name('procesoma.actualizar');
        Route::get('eliminar/{codMacroP}/{codProMA}', 'ProcesomaController@eliminar')->name('procesoma.eliminar');
        Route::get('obtener-procesos/{codMacroP}', 'ProcesomaController@obtener')->name('procesoma.obtener');
    });

    Route::group(['prefix' => 'subproceso'],function () {
        Route::get('crear', 'SubprocesoController@crear')->name('subproceso.crear');
        Route::get('mostrar/{codSubPro}', 'SubprocesoController@mostrar')->name('subproceso.mostrar');
        Route::post('guardar', 'SubprocesoController@guardar')->name('subproceso.guardar');
        Route::get('listar', 'SubprocesoController@listar')->name('subproceso.listar');
        Route::get('editar/{codSubPro}', 'SubprocesoController@editar')->name('subproceso.editar');
        Route::post('actualizar', 'SubprocesoController@actualizar')->name('subproceso.actualizar');
        Route::get('eliminar/{codSubPro}', 'SubprocesoController@eliminar')->name('subproceso.eliminar');
    });

    Route::group(['prefix' => 'procedimientosp'],function () {
        Route::get('crear', 'ProcedimientospController@crear')->name('procedimientosp.crear');
        Route::get('mostrar/{codProSP}', 'ProcedimientospController@mostrar')->name('procedimientosp.mostrar');
        Route::post('guardar', 'ProcedimientospController@guardar')->name('procedimientosp.guardar');
        Route::get('listar', 'ProcedimientospController@listar')->name('procedimientosp.listar');
        Route::get('editar/{codProSP}', 'ProcedimientospController@editar')->name('procedimientosp.editar');
        Route::post('actualizar', 'ProcedimientospController@actualizar')->name('procedimientosp.actualizar');
        Route::get('eliminar/{codProSP}', 'ProcedimientospController@eliminar')->name('procedimientosp.eliminar');
    });

    Route::group(['prefix' => 'actividad'],function () {
        Route::get('crear', 'ActividadController@crear')->name('actividad.crear');
        Route::get('mostrar/{codAct}', 'ActividadController@mostrar')->name('actividad.mostrar');
        Route::post('guardar', 'ActividadController@guardar')->name('actividad.guardar');
        Route::post('guardar', 'ActividadController@guardar')->name('actividad.guardar');
        Route::get('listar', 'ActividadController@listar')->name('actividad.listar');
        Route::get('editar/{codAct}', 'ActividadController@editar')->name('actividad.editar');
        Route::post('actualizar', 'ActividadController@actualizar')->name('actividad.actualizar');
        Route::get('eliminar/{codAct}', 'ActividadController@eliminar')->name('actividad.eliminar');
    });

    Route::group(['prefix' => 'tipo_normativa'],function () {
        Route::get('crear', 'TipoNormativaController@crear')->name('tipo_normativa.crear');
        Route::post('guardar', 'TipoNormativaController@guardar')->name('tipo_normativa.guardar');
        Route::get('listar', 'TipoNormativaController@listar')->name('tipo_normativa.listar');
        Route::get('editar/{codTipNorm}', 'TipoNormativaController@editar')->name('tipo_normativa.editar');
        Route::post('actualizar', 'TipoNormativaController@actualizar')->name('tipo_normativa.actualizar');
    });

    //cronograma
    Route::group(['prefix' => 'cronograma'], function(){
         Route::get('crear/{codPlaF}', 'CronogramaController@crear')->name('cronograma.crear');
         Route::post('guardar', 'CronogramaController@guardar')->name('cronograma.guardar');
         Route::post('actualizar', 'CronogramaController@actualizar')->name('cronograma.actualizar');
         Route::get('listar', 'CronogramaController@listar')->name('cronograma.listar');
         Route::get('mostrar/{codPlanF}', 'CronogramaController@mostrar')->name('cronograma.mostrar');
         Route::get('editar/{codPlanF}','CronogramaController@editar')->name('cronograma.editar');
    });
    //normaAuditoria
    Route::group(['prefix' => 'norma-auditoria'], function(){
        Route::get('listar', 'NormaAuditoriaController@listar')->name('norma-auditoria.listar');
        Route::get('listar-aplica', 'NormaAuditoriaController@listarAplica')->name('norma-auditoria.listar-aplica');
        Route::get('crear/{codPlanF}', 'NormaAuditoriaController@crear')->name('norma-auditoria.crear');
        Route::post('guardar', 'NormaAuditoriaController@guardar')->name('norma-auditoria.guardar');
        Route::get('editar/{codNorm}', 'NormaAuditoriaController@editar')->name('norma-auditoria.editar');
        Route::post('actualizar', 'NormaAuditoriaController@actualizar')->name('norma-auditoria.actualizar');
        Route::get('archivo-crear/{codNormMacro}', 'NormaAuditoriaController@archivocrear')->name('norma-auditoria.archivocrear');
        Route::post('archivo-registrar', 'NormaAuditoriaController@archivoregistrar')->name('norma-auditoria.archivoregistrar');
        Route::get('archivo-descargar/{codNormMacro}', 'NormaAuditoriaController@archivodescargar')->name('norma-auditoria.archivodescargar');
        Route::get('archivo-eliminar/{codNormMacro}', 'NormaAuditoriaController@archivoeliminar')->name('norma-auditoria.archivoeliminar');
        Route::get('eliminar/{codNorm}', 'NormaAuditoriaController@eliminar')->name('norma-auditoria.eliminar');

    });
    //Auditoria
    Route::group(['prefix' => 'auditoria'], function (){

       Route::get('crear', 'AuditoriaController@crear')->name('auditoria.crear');
       Route::get('mostrar/{codPlanF}', 'AuditoriaController@mostrar')->name('auditoria.mostrar');
       Route::post('guardar', 'AuditoriaController@guardar')->name('auditoria.guardar');
       Route::get('listar', 'AuditoriaController@listar')->name('auditoria.listar');
       Route::get('listar-no-programadas', 'AuditoriaController@listarNoProgramadas')->name('auditoria.listar-no-programadas');
       Route::get('editar/{codPlanF}', 'AuditoriaController@editar')->name('auditoria.editar');
       Route::post('actualizar', 'AuditoriaController@actualizar')->name('auditoria.actualizar');
       Route::get('eliminar/{codPlanF}', 'AuditoriaController@eliminar')->name('auditoria.eliminar');
       Route::get('informe/{codPlanF}', 'AuditoriaController@informeFinal')->name('auditoria.informe');
       Route::get('culminar/{codPlanF}', 'AuditoriaController@culminarAuditoria')->name('auditoria.culminar');
       Route::get('finalizar/{codPlanF}', 'AuditoriaController@finalizarAuditoria')->name('auditoria.finalizar');
       Route::get('word', 'AuditoriaController@word')->name('auditoria.word');

       //---//
       Route::get('crear-auditoria-plan-anual/{codPlanA}', 'AuditoriaController@crearAuditoriaPlanAnual')->name('auditoria.crear-auditoria-plan-anual');
       Route::get('gantt','AuditoriaController@gantt');
       Route::get('diagrama-gantt/{codPlanF}', 'AuditoriaController@diagramaGantt');
    });
    //Institucion
    Route::group(['prefix' => 'institucion'], function (){

        Route::get('listar', 'InstitucionController@listar')->name('institucion.listar');
        Route::get('editar/{codIns}', 'InstitucionController@editar')->name('institucion.editar');
        Route::post('actualizar', 'InstitucionController@actualizar')->name('institucion.actualizar');
        Route::get('listarSoftware', 'InstitucionController@listarSoftware')->name('institucion.listarSoftware');

    });

    //Objetivo General

    Route::prefix('objetivo-general')->group(function (){

        Route::post('guardar', 'ObjetivoGeneralController@guardar')->name('objetivogen.guardar');
        Route::get('editar/{codPlanF}/{codObjGen}', 'ObjetivoGeneralController@editar')->name('objetivogen.editar');
        Route::post('actualizar', 'ObjetivoGeneralController@actualizar')->name('objetivogen.actualizar');

    });

    Route::prefix('objetivo-general')->group(function (){

       Route::get('crear/{codPlanF}', 'ObjetivoGeneralController@crear')->name('objetivo-general.crear');
       Route::get('editar/{codObjEsp}', 'ObjetivoGeneralController@editar')->name('objetivo-general.editar');
       Route::post('guardar', 'ObjetivoGeneralController@guardar')->name('objetivo-general.guardar');
       Route::get('mostrar/{codPlanF}/{codObjEsp}', 'ObjetivoGeneralController@mostrar')->name('objetivo-general.mostrar');
       Route::post('actualizar', 'ObjetivoGeneralController@actualizar')->name('objetivo-general.actualizar');
       Route::get('eliminar/{codObjEsp}', 'ObjetivoGeneralController@eliminar')->name('objetivo-general.eliminar');
    });

    //Objetivo Especifico
    Route::prefix('objetivo-especifico')->group(function (){

       Route::get('crear/{codPlanF}', 'ObjetivoEspecificoController@crear')->name('objetivo-especifico.crear');
       Route::get('editar/{codObjEsp}', 'ObjetivoEspecificoController@editar')->name('objetivo-especifico.editar');
       Route::post('guardar', 'ObjetivoEspecificoController@guardar')->name('objetivo-especifico.guardar');
       Route::get('mostrar/{codPlanF}/{codObjEsp}', 'ObjetivoEspecificoController@mostrar')->name('objetivo-especifico.mostrar');
       Route::post('actualizar', 'ObjetivoEspecificoController@actualizar')->name('objetivo-especifico.actualizar');
       Route::get('eliminar/{codObjEsp}', 'ObjetivoEspecificoController@eliminar')->name('objetivo-especifico.eliminar');
    });

    Route::group(['prefix' => 'avance'], function(){
        Route::get('linea-de-tiempo', 'AvanceController@avance')->name('avance.linea');
        Route::post('buscar', 'AvanceController@buscar')->name('avance.buscar');
    });

    Route::prefix('persona')->group(function (){
        Route::get('editar/{codPer}', 'PersonaController@editar')->name('persona.editar');
        Route::get('listar', 'PersonaController@listar')->name('persona.listar');
        Route::get('crear', 'PersonaController@crear')->name('persona.crear');
        Route::post('guardar', 'PersonaController@guardar')->name('persona.guardar');
        Route::post('actualizar', 'PersonaController@actualizar')->name('persona.actualizar');
        Route::get('eliminar/{codPer}', 'PersonaController@eliminar')->name('persona.eliminar');
    });

    Route::group(['prefix' => 'informe'], function() {
        Route::get('listar', 'InformeController@listar')->name('informe.listar');
        Route::get('crear/{codPlanF}', 'InformeController@crear')->name('informe.crear');
        Route::get('editar/{codPlanF}', 'InformeController@editar')->name('informe.editar');
        Route::post('registrar', 'InformeController@registrar')->name('informe.registrar');
        Route::post('actualizar', 'InformeController@actualizar')->name('informe.actualizar');
        Route::get('mostrar/{codInf}', 'InformeController@mostrar')->name('informe.mostrar');
    });

    Route::group(['prefix' => 'informe/archivo'], function(){
        Route::get('listar/{codInf}', 'ArchivoInformeController@listar')->name('informe.archivo.listar');
        Route::get('crear/{codInf}', 'ArchivoInformeController@crear')->name('informe.archivo.crear');
        Route::post('registrar', 'ArchivoInformeController@registrar')->name('informe.archivo.registrar');
        Route::get('eliminar/{codInf}', 'ArchivoInformeController@eliminar')->name('informe.archivo.eliminar');
        Route::get('descargar/{codInf}', 'ArchivoInformeController@descargar')->name('informe.archivo.descargar');
    });
});