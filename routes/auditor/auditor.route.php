<?php
Route::group(['middleware' => ['auth','auditor']], function(){

    Route::group(['namespace' => 'Auditor','prefix' => 'auditor/procedimiento'], function(){
        Route::get('procedimientos-listar','ProcedimientoController@listar')->name('auditor.procedimiento.listar');
    });

    Route::group(['prefix' => 'auditor/desarrollo'], function(){
	    Route::get('listar','DesarrolloController@listar')->name('auditor.desarrollo.listar');
	    Route::get('crear/{codProc}','DesarrolloController@crear')->name('auditor.desarrollo.crear');
	    Route::post('registrar','DesarrolloController@registrar')->name('auditor.desarrollo.registrar');
	    Route::get('editar/{id}','DesarrolloController@editar')->name('auditor.desarrollo.editar');
	    Route::post('actualizar','DesarrolloController@actualizar')->name('auditor.desarrollo.actualizar');
	    Route::get('eliminar/{id}','DesarrolloController@eliminar')->name('auditor.desarrollo.eliminar');
	});

    Route::group(['prefix' => 'auditor/observacion'], function(){
	    Route::get('listar','ObservacionController@listar')->name('auditor.observacion.listar');
	    Route::get('crear/{codProc}','ObservacionController@crear')->name('auditor.observacion.crear');
	    Route::post('registrar','ObservacionController@registrar')->name('auditor.observacion.registrar');
	    Route::get('editar/{id}','ObservacionController@editar')->name('auditor.observacion.editar');
	    Route::post('actualizar','ObservacionController@actualizar')->name('auditor.observacion.actualizar');
	    Route::get('eliminar/{id}','ObservacionController@eliminar')->name('auditor.observacion.eliminar');
	});

	Route::group(['prefix' => 'auditor/archivo'], function(){
	    Route::get('crear/{codDes}','ArchivoController@crear')->name('auditor.archivo.crear');
	    Route::post('registrar','ArchivoController@registrar')->name('auditor.archivo.registrar');
	    Route::get('listar/{codDes}','ArchivoController@listar')->name('auditor.archivo.listar');
	    Route::get('crear','ArchivoController@crear')->name('auditor.archivo.crear');
	    Route::get('eliminar/{id}','ArchivoController@eliminar')->name('auditor.archivo.eliminar');
	    Route::get('descargar/{id}','ArchivoController@descargar')->name('auditor.archivo.descargar');
	});

});