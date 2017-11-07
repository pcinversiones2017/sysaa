<?php

Route::group(['middleware' => ['auth','supervisor']], function(){

    Route::group(['prefix' => 'supervisor'], function(){
        Route::get('mostrar','AuditorController@mostrar')->name('supervisor.auditoria.mostrar');
    });

});