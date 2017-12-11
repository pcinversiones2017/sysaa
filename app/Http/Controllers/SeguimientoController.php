<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seguimiento;
use App\Models\Observacion;
use App\Models\UsuarioRol;
use App\Models\Procedimiento;
use App\Models\Desarrollo;
use Auth;

class SeguimientoController extends Controller
{
    public function listar2($codProc, $codDes, $codObs)
    {
    	$UsuariosRoles = UsuarioRol::where('codUsu', Auth::user()->codUsu)->get();
    	foreach($UsuariosRoles as $UsuarioRol):
    		$procedimientos = Procedimiento::where('codUsuRol', $UsuarioRol->codUsuRol)->get();
    		foreach($procedimientos as $procedimiento):
    			$desarrollos = Desarrollo::where('codProc', $procedimiento->codProc)->get();
    			foreach($desarrollos as $desarrollo):
    				$observaciones = Observacion::where('codDes', $desarrollo->codDes)->get();
    				foreach($observaciones as $observacion):
    					$seguimiento = Seguimiento::where('codObs', $observacion->codObs);
    				endforeach;
    			endforeach;
    		endforeach;
    	endforeach;
    	$listarSeguimiento = 'active';
    	return view('seguimiento.listar', compact(['listarSeguimiento', 'seguimiento']));
    }

    public function listar($codObs)
    {
    	$seguimientos = Seguimiento::where('codObs', $codObs)->get();
    	return view('seguimiento.listar', compact(['seguimientos', 'codObs']));
    }

    public function crear($codObs)
    {
    	return view('seguimiento.crear', compact(['codObs']));
    }

    public function registrar(Request $request)
    {
    	$seguimiento = new Seguimiento();
    	$seguimiento->acciones = $request->acciones;
    	$seguimiento->evaluacion  = $request->evaluacion;
    	$seguimiento->estado = $request->estado;
    	$seguimiento->codObs = $request->codObs;
    	$seguimiento->save();

    	return redirect('seguimiento/listar/'.$request->codObs)->with('success', 'Se registro seguimiento');
    }

    public function editar($codObs, $codSeg)
    {
        $seguimiento = Seguimiento::find($codSeg);
    	return view('seguimiento.editar', compact(['seguimiento', 'codSeg', 'codObs']));
    }

    public function actualizar(Request $request)
    {
    	Seguimiento::where('codSeg',$request->codSeg)->update(['acciones' => $request->acciones, 'evaluacion' => $request->evaluacion,'estado' => $request->estado]);
    	return redirect('seguimiento/listar/'.$request->codObs)->with('success','Observacion actualizado');	
    }

    public function eliminar($codSeg)
    {
    	$seguimiento = Seguimiento::find($codSeg);
        $seguimiento->delete();
    	return back()->with('danger','Seguimiento eliminado');
    }

    public function general()
    {
        $seguimientos = Seguimiento::orderBy('fecha_creado', 'desc')->get();
        $listarSeguimiento = 'active';
        return view('seguimiento.general', compact(['seguimientos', 'listarSeguimiento']));
    }
    
}
