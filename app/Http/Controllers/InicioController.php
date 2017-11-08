<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Procedimiento;
use Auth;


class InicioController extends Controller
{
    public function index()
    {
    	$procedimiento = Procedimiento::where('codUsuRol',Auth::user()->usuariorol->codUsuRol)->with(['objetivoespecifico', 'desarrollo'])->get();
    	$finalizado = Procedimiento::finalizado()->where('codUsuRol',Auth::user()->usuariorol->codUsuRol)->with(['objetivoespecifico', 'desarrollo'])->get();
    	$procedimiento_general = Procedimiento::join('objetivo_especifico','objetivo_especifico.codObjEsp', '=', 'procedimiento.codObjEsp')
    						->leftJoin('desarrollo', 'desarrollo.codProc', '=', 'procedimiento.codProc') 
    						->leftJoin('usuario_roles', 'usuario_roles.codUsuRol', '=', 'procedimiento.codUsuRol')
    						->leftJoin('users', 'users.codUsu', '=', 'usuario_roles.codUsuRol')
    						->get();
    	return view('inicio.inicio', compact(['procedimiento', 'finalizado', 'procedimiento_general']));
    }
}
