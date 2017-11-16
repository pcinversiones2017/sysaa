<?php
Route::group(['middleware' => ['auth','jefe_comision']], function(){

    Route::group(['namespace' => 'Jefe_Comision','prefix' => 'jefe-comision'], function(){
        Route::get('procedimiento/aprobar/{id}','ProcedimientoController@aprobar')->name('auditor.procedimiento.aprobar');
        Route::get('procedimiento/rechazar/{id}','ProcedimientoController@rechazar')->name('auditor.procedimiento.rechazar');
        Route::get('auditoria/mostrar', 'AuditoriaController@mostrar')->name('jefe-comision.auditoria.mostrar');
    });
    
});