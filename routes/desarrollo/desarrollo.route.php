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
	    Route::get('crear/{codProc}','DesarrolloController@crear')->name('auditor.desarrollo.crear');
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
	    Route::get('eliminar/{codDes}/{codObs}','ObservacionController@eliminar')->name('auditor.observacion.eliminar');
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
		Route::view('cambiar-clave','usuario.recuperar_clave')->name('usuario.recuperar');
		Route::post('cambiar-contrasena','UsuarioController@cambiar')->name('usuario.cambiar');
	});
});