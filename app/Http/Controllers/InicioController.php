<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\Usuariorol;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Models\Procedimiento;
use App\Models\Auditoria;
use Auth;


class InicioController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $procedimiento = new Collection();
        if($user->usuariorol->codUsuRol != Rol::JEFE_OCI){
            $procedimiento = Procedimiento::where('codUsuRol',$user->usuariorol->codUsuRol)->get();
        }



//    	$procedimiento_general = Procedimiento::leftJoin('objetivo_especifico', 'objetivo_especifico.codObjEsp', '=', 'procedimiento.codObjEsp')
//                            ->leftJoin('objetivo_general', 'objetivo_general.codObjGen', '=', 'procedimiento.codObjGen')
//                            ->leftJoin('usuario_roles', 'usuario_roles.codUsuRol', '=', 'procedimiento.codUsuRol')
//                            ->join('users', 'users.codUsu', '=', 'usuario_roles.codUsu')
//                            ->join('auditoria', 'auditoria.codPlanF', '=', 'objetivo_general.codPlanF')
//                            ->join('personas', 'personas.codPer', '=', 'users.codPer')
//    						->get();


        if($user->usuariorol->codUsuRol != Rol::JEFE_OCI){
            $comision = Usuariorol::where('codPlanF', $user->usuariorol->auditoria->codPlanF)->pluck('codUsuRol')->except($user->usuariorol->codUsuRol)->toArray();

            $procedimiento_general = Procedimiento::whereIn('codUsuRol', $comision)->get();
        }else{
            $procedimiento_general = Procedimiento::all();
        }



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
