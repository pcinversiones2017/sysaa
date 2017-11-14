<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auditoria;
use App\Models\Procedimiento;

class AvanceController extends Controller
{
	public function avance()
	{
    	$auditorias = Auditoria::pluck('nombrePlanF', 'codPlanF');
    	$avance = 'active';
    	return view('avance.avance', compact(['avance', 'auditorias']));
	}

    public function buscar(Request $request)
    {
    	$auditoria = Auditoria::find($request->auditoria);
    	foreach ($auditoria->objetivoGeneral->objetivosEspecificos  as  $value):
    		$totalobjespaprobado = 	$value->procedimientos->where('fecha_aprobado', '<>', null)->count();
    		$totalobjesp = 	$value->procedimientos->where('fecha_aprobado',null)->count();
    	endforeach;
    	$totalobjgen = $auditoria->objetivoGeneral->procedimientos->where('fecha_aprobado',null)->count();
    	$totalobjgenaprobado = $auditoria->objetivoGeneral->procedimientos->where('fecha_aprobado', '<>', null)->count();

    	$auditorias = Auditoria::pluck('nombrePlanF', 'codPlanF');

    	$avance = 'active';
    	return view('avance.resultado', compact(['totalobjesp', 'totalobjgen', 'totalobjespaprobado', 'totalobjgenaprobado', 'auditorias', 'auditoria']));
    }
}
