<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informe;
use App\Models\Procedimiento;

class InformeController extends Controller
{
    public function listar($codPlanF, $codObjEsp, $codProc)
    {
    	$informe = Informe::Existe($codProc)->with('procedimiento')->get();
        $codPlanF = $codPlanF;
        $codObjEsp = $codObjEsp;
        $codProc = $codProc;
    	return view('informe.listar', compact(['codPlanF', 'codObjEsp', 'codProc', 'informe']));
    }

    public function crear($codPlanF, $codObjEsp, $codProc)
    {
    	$codPlanF = $codPlanF;
        $codObjEsp = $codObjEsp;
        $codProc = $codProc;
    	return view('informe.crear', compact(['codPlanF', 'codObjEsp', 'codProc']));
    }

    public function registrar(Request $request)
    {
    	Informe::create(['informe' => $request->informe, 'elaborado' => date("Y-m-d"), 'codProc' => $request->codProc]);
    	return redirect('informe/informe/'.$request->codPlanF.'/'.$request->codObjEsp.'/'.$request->codProc)->with('success','Informe registrado');
    }

    public function editar($codPlanF, $codObjEsp, $codProc, $codInf)
    {
        $informe = Informe::Existe($codInf)->get();
    	return view('informe.editar', compact(['informe', 'codPlanF', 'codObjEsp', 'codProc', 'codInf']));
    }

    public function actualizar(Request $request)
    {
    	Informe::Existe($request->codInf)->update(['informe' => $request->informe, 'elaborado' => date("Y-m-d")]);
    	return redirect('informe/informe/'.$request->codPlanF.'/'.$request->codObjEsp.'/'.$request->codProc)->with('success','Informe actualizado');	
    }

    public function eliminar($id)
    {
    	Informe::Existe($id)->delete();
    	return back()->with('danger','Informe eliminado');
    }
}
