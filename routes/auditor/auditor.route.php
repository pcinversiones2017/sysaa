<?php
Route::group(['middleware' => ['auth','auditor']], function(){

    Route::group(['namespace' => 'Auditor','prefix' => 'auditor/procedimiento'], function(){
        Route::get('listar','ProcedimientoController@listar')->name('auditor.procedimiento.listar');
        Route::get('mostrar/{id}', 'ProcedimientoController@mostrar')->name('auditor.procedimiento.mostrar');
        Route::get('finalizar/{id}','ProcedimientoController@finalizar')->name('auditor.procedimiento.finalizar');
    });
});