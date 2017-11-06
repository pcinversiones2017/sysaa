<?php
Route::group(['middleware' => ['auth','auditor']], function(){

    Route::group(['namespace' => 'Auditor','prefix' => 'auditor/procedimiento'], function(){
        Route::get('procedimientos-listar','ProcedimientoController@listar')->name('auditor.procedimiento.listar');
    });

    Route::group(['prefix' => 'auditor/informe'], function(){
	    Route::get('listar','InformeController@listar')->name('auditor.informe.listar');
	    Route::get('crear/{codProc}','InformeController@crear')->name('auditor.informe.crear');
	    Route::post('registrar','InformeController@registrar')->name('auditor.informe.registrar');
	    Route::get('editar/{id}','InformeController@editar')->name('auditor.informe.editar');
	    Route::post('actualizar','InformeController@actualizar')->name('auditor.informe.actualizar');
	    Route::get('eliminar/{id}','InformeController@eliminar')->name('auditor.informe.eliminar');
	});

	Route::group(['prefix' => 'auditor/archivo'], function(){
	    Route::get('crear/{codInf}','ArchivoController@crear')->name('auditor.archivo.crear');
	    Route::post('registrar','ArchivoController@registrar')->name('auditor.archivo.registrar');
	    Route::get('listar/{codInf}','ArchivoController@listar')->name('auditor.archivo.listar');
	    Route::get('crear','ArchivoController@crear')->name('auditor.archivo.crear');
	    Route::get('eliminar/{id}','ArchivoController@eliminar')->name('auditor.archivo.eliminar');
	    Route::get('descargar/{id}','ArchivoController@descargar')->name('auditor.archivo.descargar');
	});

});