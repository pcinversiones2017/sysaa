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

require __DIR__.'/auditor/auditor.route.php';
require __DIR__.'/jefe_comision/jefe_comision.route.php';
require __DIR__.'/jefe_oci/jefe_oci.route.php';
require __DIR__.'/supervisor/supervisor.route.php';
require __DIR__.'/autentificacion/autentificacion.route.php';
require __DIR__.'/desarrollo/desarrollo.route.php';

Route::get('/', 'InicioController@index')->middleware('auth');

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::get('word', 'WordController@index');