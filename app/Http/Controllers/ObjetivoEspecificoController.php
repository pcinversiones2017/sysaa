<?php
/**
 * Created by PhpStorm.
 * User: Programador1
 * Date: 25/10/2017
 * Time: 17:52
 */

namespace App\Http\Controllers;

use App\Models\ObjtivoEspecifico;
use Illuminate\Http\Request;

class ObjetivoEspecificoController extends Controller
{
    public function guardar(Request $request)
    {
        $objetivoEspecifico = new ObjtivoEspecifico();
        $objetivoEspecifico->nombre = $request->nombre;
        $objetivoEspecifico->materia = $request->materia;
        $objetivoEspecifico->codMacroP = $request->codMacroP;
        $objetivoEspecifico->codObjGen = $request->codObjGen;
        $objetivoEspecifico->save();
        return redirect('auditoria/mostrar/' . $request->codPlanF);
    }
}