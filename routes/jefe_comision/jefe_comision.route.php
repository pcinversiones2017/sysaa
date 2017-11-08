<?php
Route::group(['middleware' => ['auth','jefe_comision']], function(){

    Route::group(['namespace' => 'Jefe_Comision','prefix' => 'jefe-comision/procedimiento'], function(){
        Route::get('aprobar/{id}','ProcedimientoController@aprobar')->name('auditor.procedimiento.aprobar');
        Route::get('rechazar/{id}','ProcedimientoController@rechazar')->name('auditor.procedimiento.rechazar');
    });
    
});