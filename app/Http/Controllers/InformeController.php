<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informe;
use App\Models\Procedimiento;
use App\Models\Historial;
use Auth;

class InformeController extends Controller
{
    public function listar($codPlanF, $codObjEsp, $codProc)
    {
    	$informe = Informe::Existe($codProc)->with('procedimiento')->get();
        $codPlanF = $codPlanF;
        $codObjEsp = $codObjEsp;
        $codProc = $codProc;
        RegistrarActividad(Informe::TABLA,Historial::LEER,'vió el listado de Informes');
    	return view('informe.listar', compact(['codPlanF', 'codObjEsp', 'codProc', 'informe']));
    }

    public function crear($codPlanF, $codObjEsp, $codProc)
    {
    	$codPlanF = $codPlanF;
        $codObjEsp = $codObjEsp;
        $codProc = $codProc;
        RegistrarActividad(Informe::TABLA,Historial::CREAR,'vió el formulario de crear Informe');
    	return view('informe.crear', compact(['codPlanF', 'codObjEsp', 'codProc']));
    }

    public function registrar(Request $request)
    {
    	Informe::create(['informe' => $request->informe, 'elaborado' => date("Y-m-d"), 'codProc' => $request->codProc]);
        RegistrarActividad(Informe::TABLA,Historial::REGISTRAR,'registró el Informe '.$request->nombre);
    	return redirect('informe/informe/'.$request->codPlanF.'/'.$request->codObjEsp.'/'.$request->codProc)->with('success','Informe registrado');
    }

    public function editar($codPlanF, $codObjEsp, $codProc, $codInf)
    {
        $informe = Informe::Existe($codInf)->get();
        RegistrarActividad(Informe::TABLA,Historial::EDITAR,'vió el formulario de editar Informe '.$informe->nombre);
    	return view('informe.editar', compact(['informe', 'codPlanF', 'codObjEsp', 'codProc', 'codInf']));
    }

    public function actualizar(Request $request)
    {
    	Informe::Existe($request->codInf)->update(['informe' => $request->informe, 'elaborado' => date("Y-m-d")]);
        RegistrarActividad(Informe::TABLA,Historial::ACTUALIZAR,'actualizó el Informe '.$request->nombre);
    	return redirect('informe/informe/'.$request->codPlanF.'/'.$request->codObjEsp.'/'.$request->codProc)->with('success','Informe actualizado');	
    }

    public function eliminar($id)
    {
    	Informe::Existe($id)->delete();
        RegistrarActividad(Informe::TABLA,Historial::ELIMINAR,'eliminó el Informe '.$informe->nombre);
    	return back()->with('danger','Informe eliminado');
    }
}
