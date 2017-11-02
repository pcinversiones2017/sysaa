<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Procedimiento\ValidarRequest;
use App\Models\Procedimiento;
use App\Models\Usuariorol;

class ProcedimientoController extends Controller
{
    public function listar()
    {
    	$procedimiento = Procedimiento::Activo()->get();
    	return view('procedimiento.listar', compact('procedimiento'));
    }

    public function crear($codPlanF, $codObjEsp)
    {
    	$usuariorol = Usuariorol::with('usuario')->get();
    	return view('procedimiento.crear', compact(['codPlanF', 'codObjEsp', 'usuariorol']));
    }

    public function registrar(ValidarRequest $request)
    {
    	Procedimiento::create([	
    					'justificacion' => $request->justificacion, 
    					'detalle' 		=> $request->detalle, 
    					'fechafin' 		=> $request->fechafin,
    					'codUsuRol'		=> $request->codusurol,
    					'codObjEsp' 	=> $request->codObjEsp
    				]);
    	return redirect('objetivo-especifico/mostrar/'.$request->codPlanF.'/'.$request->codObjEsp)->with('success','Se agrego Procedimiento');
    }

    public function editar($codPlanF, $codObjEsp, $codProc)
    {
    	$procedimiento = Procedimiento::Existe($codProc)->get();
    	$usuariorol = Usuariorol::with('usuario')->get();
    	return view('procedimiento.editar', compact(['codPlanF', 'codObjEsp', 'codProc','procedimiento', 'usuariorol']));
    }

    public function actualizar(ValidarRequest $request)
    {
    	Procedimiento::Existe($request->codProc)->update(['justificacion' => $request->justificacion,'detalle' => $request->detalle, 'fechafin'=> $request->fechafin,'codUsuRol'		=> $request->codusurol,]);
    	return redirect('objetivo-especifico/mostrar/'.$request->codPlanF.'/'.$request->codObjEsp)->with('success','Procedimiento actualizado');	
    }

    public function eliminar($codProc)
    {
    	Procedimiento::Existe($codProc)->update(['eliminado' => true]);
    	return back()->with('danger','Procedimiento eliminado');
    }
}
