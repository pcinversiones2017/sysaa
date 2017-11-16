<?php
/**
 * Created by PhpStorm.
 * User: cesar
 * Date: 15/11/17
 * Time: 03:10 PM
 */

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

    }
}