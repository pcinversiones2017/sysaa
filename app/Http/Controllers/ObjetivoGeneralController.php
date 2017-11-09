<?php

namespace App\Http\Controllers;


use App\Models\ObjetivoGeneral;
use Illuminate\Http\Request;
use App\Models\Historial;
use Auth;

class ObjetivoGeneralController extends Controller
{
    public function guardar(Request $request)
    {
        $objetivoGeneral = new ObjetivoGeneral();
        $objetivoGeneral->nombre = $request->nombre;
        $objetivoGeneral->codPlanF = $request->codPlanF;
        $objetivoGeneral->save();
        RegistrarActividad(ObjetivoGeneral::TABLA,Historial::REGISTRAR,'registró el Objetivo General '.$request->nombre);

        return redirect('auditoria/mostrar/' . $request->codPlanF);
    }

    public function eliminar($id)
    {
    	$objetivoGeneral = ObjetivoGeneral::find($id);
    	$objetivoGeneral->delete();
    	RegistrarActividad(ObjetivoGeneral::TABLA,Historial::ELIMINAR,'eliminó el Objetivo General '.$objetivoGeneral->nombre);
    	return back()->with('danger', 'Objetivo General eliminado');
    }
}