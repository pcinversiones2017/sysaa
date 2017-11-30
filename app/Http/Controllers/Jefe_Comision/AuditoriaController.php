<?php

namespace App\Http\Controllers\Jefe_Comision;

use App\Http\Controllers\Controller;
use App\Models\Auditoria;
use Zend\Stdlib\Request;

class AuditoriaController extends Controller
{

    public function mostrar(Request $request)
    {
        $codPlanF = decrypt($request->codPlanF);
        $auditoria = Auditoria::find($codPlanF);
        return view('jefe-comision.auditoria.mostrar', compact('auditoria'));
    }

    public function listar()
    {
    	$auditorias = Auditoria::where('codEstAud',2)->get();
    	return view('jefe_comision.auditoria.listar', compact(['auditorias']));
    }

    public function aprobar($codPlanF)
    {
    	$auditoria = Auditoria::find($codPlanF);
    	$auditoria->codEstAud = 3;
    	$auditoria->save();
    	
    	return back()->with('success', 'Auditoria Aprobada');
    }
}