<?php

namespace App\Http\Controllers\Auditor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Desarrollo;
use App\Models\Observacion;
use App\Models\Procedimiento;
use App\Models\Historial;
use Auth;

class ProcedimientoController extends Controller
{
    public function listar()
    {
        $finalizado = Procedimiento::finalizado()->where('codUsuRol',Auth::user()->usuariorol->codUsuRol)->with(['objetivoespecifico', 'desarrollo'])->get();
    	$procedimiento = Procedimiento::where('codUsuRol',Auth::user()->usuariorol->codUsuRol)->with(['objetivoespecifico', 'desarrollo'])->get();
        RegistrarActividad(Procedimiento::TABLA,Historial::LEER,'vió el listado de Procedimientos');
    	return view('auditor.procedimiento.listar', compact(['procedimiento', 'finalizado']));
    }

    public function mostrar($id)
    {
        $procedimiento = Procedimiento::existe($id)->with('desarrollo')->first();
		$observacion = Observacion::desarrollo($procedimiento->desarrollo->codDes)->get();        
        return view('auditor.procedimiento.mostrar', compact(['procedimiento', 'observacion']));
    }

    public function finalizar($id)
    {
        Procedimiento::existe($id)->update(['fecha_terminado' => date("Y-m-d")]);
        return redirect('/')->with('success', 'Procedimiento Finalizado');
    }
}
