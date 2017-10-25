<?php
/**
 * Created by PhpStorm.
 * User: Programador1
 * Date: 25/10/2017
 * Time: 16:13
 */

namespace App\Http\Controllers;


use App\Models\ObjetivoGeneral;
use Illuminate\Http\Request;

class ObjetivoGeneralController extends Controller
{
    public function guardar(Request $request)
    {
        $objetivoGeneral = new ObjetivoGeneral();
        $objetivoGeneral->nombre = $request->nombre;
        $objetivoGeneral->codPlanF = $request->codPlanF;
        $objetivoGeneral->save();

        return redirect('auditoria/mostrar/' . $request->codPlanF);
    }
}