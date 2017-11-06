<?php
Route::group(['middleware' => ['auth','auditor']], function(){

    Route::group(['namespace' => 'Auditor','prefix' => 'auditor/procedimiento'], function(){
        Route::get('procedimientos-listar','ProcedimientoController@listar')->name('auditor.procedimiento.listar');
    });

});