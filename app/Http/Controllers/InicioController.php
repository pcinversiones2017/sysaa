<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Procedimiento;
use Auth;


class InicioController extends Controller
{
    public function index()
    {
    	$procedimiento = Procedimiento::where('codUsuRol',Auth::user()->usuariorol->codUsuRol)->get();
    	$procedimiento_general = Procedimiento::leftJoin('usuario_roles', 'usuario_roles.codUsuRol', '=', 'procedimiento.codUsuRol')
    						->leftJoin('users', 'users.codUsu', '=', 'usuario_roles.codUsu')
                            ->join('personas', 'personas.codPer', '=', 'users.codPer')
                            ->select('justificacion', 'detalle', 'fecha_terminado', 'fecha_rechazado', 'fecha_fin',
                                    'nombres', 'paterno', 'materno', 'codEst', 'procedimiento.codProc', 'procedimiento.codUsuRol')
    						->get();
    	$asignado = Procedimiento::asignado()->where('codUsuRol',Auth::user()->usuariorol->codUsuRol)->with(['objetivoespecifico', 'desarrollo'])->get();
    	$pendiente = Procedimiento::pendiente()->where('codUsuRol',Auth::user()->usuariorol->codUsuRol)->with(['objetivoespecifico', 'desarrollo'])->get();
    	$finalizado = Procedimiento::finalizado()->where('codUsuRol',Auth::user()->usuariorol->codUsuRol)->with(['objetivoespecifico', 'desarrollo'])->get();
    	$aprobado = Procedimiento::aprobado()->where('codUsuRol',Auth::user()->usuariorol->codUsuRol)->with(['objetivoespecifico', 'desarrollo'])->get();
    	$rechazado = Procedimiento::rechazado()->where('codUsuRol',Auth::user()->usuariorol->codUsuRol)->with(['objetivoespecifico', 'desarrollo'])->get();
        $asignado_g = Procedimiento::asignado()->with(['objetivoespecifico', 'desarrollo'])->get();
        $pendiente_g = Procedimiento::pendiente()->with(['objetivoespecifico', 'desarrollo'])->get();
        $finalizado_g = Procedimiento::finalizado()->with(['objetivoespecifico', 'desarrollo'])->get();
        $aprobado_g = Procedimiento::aprobado()->with(['objetivoespecifico', 'desarrollo'])->get();
        $rechazado_g = Procedimiento::rechazado()->with(['objetivoespecifico', 'desarrollo'])->get();
    	return view('inicio.inicio', compact(['procedimiento', 'finalizado', 'procedimiento_general', 'aprobado', 'rechazado', 'pendiente', 'asignado', 'aprobado_g', 'rechazado_g', 'pendiente_g', 'asignado_g', 'finalizado_g']));
    }
}
