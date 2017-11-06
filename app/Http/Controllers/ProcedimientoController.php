<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Procedimiento\ValidarRequest;
use App\Models\Procedimiento;
use App\Models\Usuariorol;
use App\Models\Historial;
use Auth;

class ProcedimientoController extends Controller
{
    public function listar()
    {
    	$procedimiento = Procedimiento::all();
        RegistrarActividad(Procedimiento::TABLA,Historial::LEER,'vió el listado de Procedimientos');
    	return view('procedimiento.listar', compact('procedimiento'));
    }

    public function crear($codPlanF, $codObjEsp)
    {
    	$usuariorol = Usuariorol::with('usuario')->get();
        RegistrarActividad(Procedimiento::TABLA,Historial::CREAR,'vió el formulario de crear Procedimiento');
    	return view('procedimiento.crear', compact(['codPlanF', 'codObjEsp', 'usuariorol']));
    }

    public function registrar(ValidarRequest $request)
    {
    	Procedimiento::create([	
    					'justificacion' => $request->justificacion, 
    					'detalle' 		=> $request->detalle, 
    					'fechafin' 		=> date('Y-m-d', strtotime($request->fechafin)),
    					'codUsuRol'		=> $request->codusurol,
    					'codObjEsp' 	=> $request->codObjEsp
    				]);
        RegistrarActividad(Procedimiento::TABLA,Historial::REGISTRAR,'registró el Procedimiento '.$request->justificacion);
    	return redirect('objetivo-especifico/mostrar/'.$request->codPlanF.'/'.$request->codObjEsp)->with('success','Se agrego Procedimiento');
    }

    public function editar($codPlanF, $codObjEsp, $codProc)
    {
    	$procedimiento = Procedimiento::Existe($codProc)->get();
    	$usuariorol = Usuariorol::with('usuario')->get();
        RegistrarActividad(Procedimiento::TABLA,Historial::EDITAR,'vió el formulario de editar el Procedimiento ');
    	return view('procedimiento.editar', compact(['codPlanF', 'codObjEsp', 'codProc','procedimiento', 'usuariorol']));
    }

    public function actualizar(ValidarRequest $request)
    {
    	Procedimiento::Existe($request->codProc)->update(['justificacion' => $request->justificacion,'detalle' => $request->detalle, 'fechafin'=> $request->fechafin,'codUsuRol'		=> $request->codusurol,]);
        RegistrarActividad(Procedimiento::TABLA,Historial::ACTUALIZAR,'actualizó el Procedimiento '.$request->nombre);
    	return redirect('objetivo-especifico/mostrar/'.$request->codPlanF.'/'.$request->codObjEsp)->with('success','Procedimiento actualizado');	
    }

    public function eliminar($codProc)
    {

    	$procedimiento = Procedimiento::find($codProc);
    	$procedimiento->delete();
        RegistrarActividad(Procedimiento::TABLA,Historial::ELIMINAR,'eliminó el Procedimiento ');

    	return back()->with('danger','Procedimiento eliminado');
    }
}
