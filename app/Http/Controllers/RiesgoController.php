<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Procesoma;
use App\Models\Subproceso;
use App\Models\Procedimientosp;
use App\Models\Auditoria;

class RiesgoController extends Controller
{
    public function listar()
    {
    	$auditoria = Auditoria::pluck('nombrePlanF', 'codPlanF');
    	$listarRiesgos = 'active';
    	return view('riesgos.listar', compact(['auditoria', 'listarRiesgos']));
    }

    public function buscar(Request $request)
    {
    	$auditorias = Auditoria::pluck('nombrePlanF', 'codPlanF');
    	$auditoria = Auditoria::where('auditoria.codPlanF', $request->auditoria)->get();
    	$proceso_ma = Auditoria::join('objetivo_especifico', 'objetivo_especifico.codObjGen', '=', 'auditoria.codPlanF')
    					->join('macroproceso', 'macroproceso.codMacroP', '=', 'objetivo_especifico.codMacroP')
    					->join('proceso_ma', 'proceso_ma.codMacroP', '=', 'objetivo_especifico.codMacroP')
    					->where('auditoria.codPlanF', $request->auditoria)
    					->select('proceso_ma.nombre as pronom', 'proceso_ma.riesgo as prorie', 'proceso_ma.ponderacion as propon'
    						)
    					->get();
    	$subproceso = Auditoria::join('objetivo_especifico', 'objetivo_especifico.codObjGen', '=', 'auditoria.codPlanF')
    					->join('macroproceso', 'macroproceso.codMacroP', '=', 'objetivo_especifico.codMacroP')
    					->join('proceso_ma', 'proceso_ma.codMacroP', '=', 'objetivo_especifico.codMacroP')
    					->join('subproceso', 'subproceso.codProMa', '=', 'proceso_ma.codProMa')
    					->leftJoin('procedimiento_sp', 'procedimiento_sp.codSubPro', '=', 'subproceso.codSubPro')
    					->where('auditoria.codPlanF', $request->auditoria)
    					->select('subproceso.nombre as subnom', 'subproceso.riesgo as subrie', 'subproceso.ponderacion as subpon')
    					->get();
    	$procedimiento_sp = Auditoria::join('objetivo_especifico', 'objetivo_especifico.codObjGen', '=', 'auditoria.codPlanF')
    					->join('macroproceso', 'macroproceso.codMacroP', '=', 'objetivo_especifico.codMacroP')
    					->join('proceso_ma', 'proceso_ma.codMacroP', '=', 'objetivo_especifico.codMacroP')
    					->join('subproceso', 'subproceso.codProMa', '=', 'proceso_ma.codProMa')
    					->join('procedimiento_sp', 'procedimiento_sp.codSubPro', '=', 'subproceso.codSubPro')
    					->where('auditoria.codPlanF', $request->auditoria)
    					->select('procedimiento_sp.nombre as prospnom', 'procedimiento_sp.riesgo as prosprie', 'procedimiento_sp.ponderacion as prosppon')
    					->get();
    	$listarRiesgos = 'active';
    	return view('riesgos.resultado', compact(['auditoria', 'proceso_ma', 'subproceso', 'procedimiento_sp','auditorias', 'listarRiesgos']));

    }			
}
