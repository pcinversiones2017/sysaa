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
Route::prefix('tipo_normativa')->group(function () {
    Route::get('crear', 'TipoNormativaController@crear');
    Route::post('guardar', 'TipoNormativaController@guardar');
    Route::get('listar', 'TipoNormativaController@listar');
    Route::get('editar/{codTipNorm}', 'TipoNormativaController@editar');
    Route::post('actualizar', 'TipoNormativaController@actualizar');
});
Route::prefix('actividad')->group(function () {
    Route::get('crear', 'ActividadController@crear');
    Route::post('guardar', 'ActividadController@guardar');
    Route::get('listar', 'ActividadController@listar');
    Route::get('editar/{codAct}', 'ActividadController@editar');
    Route::post('actualizar', 'ActividadController@actualizar');
});
//cronograma
Route::prefix('cronograma')->group(function () {
    Route::get('crear', 'CronogramaController@crear');
});
//Auditoria
Route::prefix('auditoria')->group(function (){
   Route::get('crear', 'AuditoriaController@crear');
});
