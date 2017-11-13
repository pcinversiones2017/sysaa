<?php

namespace App\Http\Controllers\Jefe_OCI;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Procedimiento\ValidarRequest;
use App\Models\Usuariorol;
use App\Models\Procedimiento;
use App\Models\Historial;

class ProcedimientoController extends Controller
{
    public function crear($codPlanF)
    {
    	$usuariorol = Usuariorol::where('codPlanF', $codPlanF)->with('usuario')->get()->except(1);
        RegistrarActividad(Procedimiento::TABLA,Historial::CREAR,'vió el formulario de crear Procedimiento');
    	return view('jefe_oci.procedimiento.crear', compact(['codPlanF', 'usuariorol']));
    }

    public function registrar(Request $request)
    {
    	Procedimiento::create([	
    					'justificacion' => $request->justificacion, 
    					'detalle' 		=> $request->detalle, 
    					'fecha_fin' 	=> date('Y-m-d', strtotime($request->fechafin)),
    					'codUsuRol'		=> $request->codUsuRol,
    					'codObjGen' 	=> $request->codPlanF,
                        'codEst'         => 1
    				]);
    	RegistrarActividad(Procedimiento::TABLA,Historial::REGISTRAR,'registró el Procedimiento '.$request->justificacion);
    	return redirect('auditoria/mostrar/'.$request->codPlanF)->with('success','Se agrego Procedimiento');
    }

    public function editar($codPlanF, $codProc)
    {
    	$procedimiento = Procedimiento::find($codProc);
    	$usuariorol = Usuariorol::with('usuario')->get();
        RegistrarActividad(Procedimiento::TABLA,Historial::EDITAR,'vió el formulario de editar el Procedimiento ');
    	return view('jefe_oci.procedimiento..editar', compact(['codPlanF', 'codProc','procedimiento', 'usuariorol']));
    }

    public function actualizar(ValidarRequest $request)
    {
        Procedimiento::existe($request->codProc)->update([ 
                        'justificacion' => $request->justificacion, 
                        'detalle'       => $request->detalle, 
                        'fecha_fin'     => date('Y-m-d', strtotime($request->fechafin)),
                        'codUsuRol'     => $request->codUsuRol,
    					'codObjGen' 	=> $request->codPlanF,
                        'codEst'         => 1
                    ]);
        RegistrarActividad(Procedimiento::TABLA,Historial::REGISTRAR,'registró el Procedimiento '.$request->justificacion);
        return redirect('auditoria/mostrar/'.$request->codPlanF)->with('success','Se agrego Procedimiento');
    }

    public function eliminar($codProc)
    {
    	$procedimiento = Procedimiento::find($codProc);
    	$procedimiento->delete();
        RegistrarActividad(Procedimiento::TABLA,Historial::ELIMINAR,'eliminó el Procedimiento '. $procedimiento->justificacion);
        return back()->with('danger', 'Procedimiento elimado');
    }
}
