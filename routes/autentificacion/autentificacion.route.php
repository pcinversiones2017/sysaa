<?php 

Route::get('login', ['as' => 'login', 'uses' => 'LoginController@login']);
Route::post('iniciar-sesion', 'LoginController@authenticate');
Route::get('cerrar-sesion','LoginController@logout');