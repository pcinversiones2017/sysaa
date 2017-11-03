<?php
Route::group(['middleware' => ['auth','auditor']], function(){

    Route::group(['prefix' => 'auditor'], function(){

        Route::get('procedimientos','AuditorController@index')->name('auditor.inicio');
    });

});