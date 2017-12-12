<?php
Route::group(['middleware' => ['auth']], function(){

	Route::group(['namespace' => 'Auditor','prefix' => 'auditor/procedimiento'], function(){
        Route::get('listar','ProcedimientoController@listar')->name('auditor.procedimiento.listar');
        Route::get('mostrar/{id}', 'ProcedimientoController@mostrar')->name('auditor.procedimiento.mostrar');
        Route::get('finalizar/{id}','ProcedimientoController@finalizar')->name('auditor.procedimiento.finalizar');
    });

	Route::group(['namespace' => 'Jefe_Comision','prefix' => 'jefe-comision/procedimiento'], function(){
        Route::get('aprobar/{id}','ProcedimientoController@aprobar')->name('auditor.procedimiento.aprobar');
        Route::get('rechazar/{id}','ProcedimientoController@rechazar')->name('auditor.procedimiento.rechazar');
    });

    Route::group(['prefix' => 'auditor/desarrollo'], function(){
	    Route::get('listar','DesarrolloController@listar')->name('auditor.desarrollo.listar');
	    Route::get('crear/{procedimiento}','DesarrolloController@crear')->name('auditor.desarrollo.crear');
	    Route::post('registrar','DesarrolloController@registrar')->name('auditor.desarrollo.registrar');
	    Route::get('editar/{codProc}/{codDes}','DesarrolloController@editar')->name('auditor.desarrollo.editar');
	    Route::post('actualizar','DesarrolloController@actualizar')->name('auditor.desarrollo.actualizar');
	    Route::get('eliminar/{id}','DesarrolloController@eliminar')->name('auditor.desarrollo.eliminar');
	});

    Route::group(['prefix' => 'auditor/observacion', 'namespace' => 'Auditor'], function(){
	    Route::get('listar','ObservacionController@listar')->name('auditor.observacion.listar');
	    Route::get('crear/{codProc}/{codDes}','ObservacionController@crear')->name('auditor.observacion.crear');
	    Route::post('registrar','ObservacionController@registrar')->name('auditor.observacion.registrar');
	    Route::get('editar/{codProc}/{codDes}/{codObs}','ObservacionController@editar')->name('auditor.observacion.editar');
	    Route::post('actualizar','ObservacionController@actualizar')->name('auditor.observacion.actualizar');
	    Route::get('eliminar/{codProc}/{codDes}/{codObs}','ObservacionController@eliminar')->name('auditor.observacion.eliminar');
	});

	Route::group(['prefix' => 'auditor/archivo'], function(){
	    Route::get('crear/{codProc}/{codDes}','ArchivoController@crear')->name('auditor.archivo.crear');
	    Route::post('registrar','ArchivoController@registrar')->name('auditor.archivo.registrar');
	    Route::get('listar/{codProc}/{codDes}','ArchivoController@listar')->name('auditor.archivo.listar');
	    Route::get('crear','ArchivoController@crear')->name('auditor.archivo.crear');
	    Route::get('eliminar/{id}','ArchivoController@eliminar')->name('auditor.archivo.eliminar');
	    Route::get('descargar/{id}','ArchivoController@descargar')->name('auditor.archivo.descargar');
	});

	Route::group(['prefix' => 'auditor/observacion/archivo', 'namespace' => 'Auditor'], function(){
	    Route::get('crear/{codProc}/{codDes}/{codObs}','ArchivoController@crear')->name('auditor.observacion.archivo.crear');
	    Route::post('registrar','ArchivoController@registrar')->name('auditor.observacion.archivo.registrar');
	    Route::get('listar/{codProc}/{codDes}/{codObs}','ArchivoController@listar')->name('auditor.observacion.archivo.listar');
	    Route::get('crear','ArchivoController@crear')->name('auditor.observacion.archivo.crear');
	    Route::get('eliminar/{id}','ArchivoController@eliminar')->name('auditor.observacion.archivo.eliminar');
	    Route::get('descargar/{id}','ArchivoController@descargar')->name('auditor.observacion.archivo.descargar');
	});

	Route::group(['prefix' => 'usuario'], function(){
		$activo = 'active';
		Route::view('cambiar-clave','usuario.recuperar_clave', compact('activo'))->name('usuario.recuperar');
		Route::post('cambiar-contrasena','UsuarioController@cambiar')->name('usuario.cambiar');
	});

	Route::group(['prefix' => 'riesgos'], function(){
		Route::get('listar', 'RiesgoController@listar')->name('riesgos.listar');
		Route::post('buscar-auditoria', 'RiesgoController@buscar')->name('riesgos.buscar');
	});

    Route::group(['prefix' => 'seguimiento'], function(){
    	Route::get('listar/{codObs}', 'SeguimientoController@listar')->name('seguimiento.listar');
    	Route::get('crear/{codObs}', 'SeguimientoController@crear')->name('seguimiento.crear');
    	Route::post('registrar', 'SeguimientoController@registrar')->name('seguimiento.registrar');
    	Route::get('editar/{codObs}/{codSeg}', 'SeguimientoController@editar')->name('seguimiento.editar');
    	Route::post('actualizar', 'SeguimientoController@actualizar')->name('seguimiento.actualizar');
    	Route::get('eliminar/{codSeg}', 'SeguimientoController@eliminar')->name('seguimiento.eliminar');
    	Route::get('lista-general', 'SeguimientoController@general')->name('seguimiento.general');
    });

	Route::group(['prefix' => 'seguimiento/archivo'], function(){
	    Route::get('crear/{codObs}/{codSeg}','SeguimientoArchivoController@crear')->name('seguimiento.archivo.crear');
	    Route::post('registrar','SeguimientoArchivoController@registrar')->name('seguimiento.archivo.registrar');
	    Route::get('listar/{codObs}/{codSeg}','SeguimientoArchivoController@listar')->name('seguimiento.archivo.listar');
	    Route::get('crear','SeguimientoArchivoController@crear')->name('seguimiento.archivo.crear');
	    Route::get('eliminar/{id}','SeguimientoArchivoController@eliminar')->name('seguimiento.archivo.eliminar');
	    Route::get('descargar/{id}','SeguimientoArchivoController@descargar')->name('seguimiento.archivo.descargar');
	});

	Route::group(['prefix' => 'auditoria', 'namespace' => 'Jefe_Comision'], function(){
		Route::get('listado', 'AuditoriaController@listar')->name('auditoria.listar');
		Route::get('aprobar/{codPlanF}', 'AuditoriaController@aprobar')->name('auditoria.aprobar');
	});

	Route::group(['prefix' => 'procedimiento'], function(){
		Route::get('detalle/{codProc}', 'ProcedimientoController@detalle')->name('procedimiento.detalle');
	});

    Route::prefix('reporte')->group(function (){
       Route::get('planificacion/{codPlanF}', 'ReporteController@planificacion');
       Route::get('informe-final/{codPlanF}', 'ReporteController@informeFinal');
    });

    Route::group(['prefix' => 'observacion'], function(){
    	Route::get('listar', 'ObservacionController@listar')->name('observacion.listar');
    });

    Route::get('listar-general', 'MacroprocesoController@general')->name('macroproceso.general');
});