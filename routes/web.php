<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('test', 'TestController@test');
Route::get('planificacion', 'PlanificacionController@index');

//Plan
Route::prefix('plan')->group(function () {
    Route::get('crear', 'PlanController@crear');
    Route::post('guardar', 'PlanController@guardar');
    Route::get('listar', 'PlanController@listar');
    Route::get('editar/{codPlanA}', 'PlanController@editar');
    Route::post('actualizar', 'PlanController@actualizar');
});
//cronograma
Route::prefix('cronograma')->group(function () {
     Route::get('crear', 'CronogramaController@crear');
     Route::get('editar/{cod}','CronogramaController@test');
});
//Auditoria
Route::prefix('auditoria')->group(function (){

   Route::get('crear', 'AuditoriaController@crear');
   Route::get('mostrar/{codPlanF}', 'AuditoriaController@mostrar');
   Route::post('guardar', 'AuditoriaController@guardar');
   Route::get('listar', 'AuditoriaController@listar');
   Route::get('editar/{codPlanF}', 'AuditoriaController@editar');
   Route::post('actualizar', 'PlanController@actualizar');

});
//Objetivo General

Route::prefix('objetivo-general')->group(function (){

    Route::post('guardar', 'ObjetivoGeneralController@guardar');
});