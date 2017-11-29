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
        $listarProcedimiento = 'active';
    	$procedimiento = Procedimiento::where('codUsuRol',Auth::user()->usuariorol->codUsuRol)->with(['objetivoespecifico', 'desarrollo'])->get();

        $asignado = Procedimiento::asignado()->where('codUsuRol',Auth::user()->usuariorol->codUsuRol)->with(['objetivoespecifico', 'desarrollo'])->get();
        $pendiente = Procedimiento::pendiente()->where('codUsuRol',Auth::user()->usuariorol->codUsuRol)->with(['objetivoespecifico', 'desarrollo'])->get();
        $finalizado = Procedimiento::finalizado()->where('codUsuRol',Auth::user()->usuariorol->codUsuRol)->with(['objetivoespecifico', 'desarrollo'])->get();
        $aprobado = Procedimiento::aprobado()->where('codUsuRol',Auth::user()->usuariorol->codUsuRol)->with(['objetivoespecifico', 'desarrollo'])->get();
        $rechazado = Procedimiento::rechazado()->where('codUsuRol',Auth::user()->usuariorol->codUsuRol)->with(['objetivoespecifico', 'desarrollo'])->get();
        RegistrarActividad(Procedimiento::TABLA,Historial::LEER,'vió el listado de Procedimientos');
    	return view('auditor.procedimiento.listar', compact(['procedimiento', 'asignado', 'pendiente', 'finalizado', 'aprobado', 'rechazado', 'listarProcedimiento']));
    }

    public function mostrar($id)
    {
        $procedimiento = Procedimiento::existe($id)->with('desarrollo')->first();
		$observacion = Observacion::where('codDes',$procedimiento->desarrollo->codDes)->get();       
        return view('auditor.procedimiento.mostrar', compact(['procedimiento', 'observacion', 'id']));
    }

    public function finalizar($id)
    {
        Procedimiento::existe($id)->update(['fecha_terminado' => date("Y-m-d"), 'codEst' => 3]);
        return redirect('/')->with('success', 'Procedimiento Finalizado');
    }

    public function aprobar($id)
    {
        Procedimiento::existe($id)->update(['fecha_terminado' => date("Y-m-d"), 'fecha_aprobado' => date("Y-m-d"), 'codEst' => 4]);
        return redirect('/')->with('success', 'Procedimiento Finalizado');
    }

    public function rechazar($id)
    {
        Procedimiento::existe($id)->update(['fecha_terminado' => date("Y-m-d"), 'fecha_rechazado' => date("Y-m-d"), 'codEst' => 5]);
        return redirect('/')->with('success', 'Procedimiento Finalizado');
    }
}
