<?php

namespace App\Http\Controllers\Auditor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Observacion;
use App\Models\Procedimiento;
use App\Models\Historial;
use Auth;

class ObservacionController extends Controller
{
    public function listar()
    {
    	$observacion = Observacion::all();
        RegistrarActividad(Observacion::TABLA,Historial::LEER,'vió el listado de Observaciones');
    	return view('observacion.listar', compact(['observacion']));
    }

    public function crear($codProc, $codDes)
    {
        RegistrarActividad(Observacion::TABLA,Historial::CREAR,'vió el formulario de crear Observacion');
    	return view('observacion.crear', compact(['codProc', 'codDes']));
    }

    public function registrar(Request $request)
    {
    	Observacion::create(['titulo' => $request->titulo,'descripcion' => $request->informe, 'recomendacion' => $request->recomendacion, 'elaborado' => date("Y-m-d"), 'codDes' => $request->codDes]);
        RegistrarActividad(Observacion::TABLA,Historial::REGISTRAR,'registró la Observacion '.$request->nombre);
    	return redirect('auditor/procedimiento/mostrar/'.$request->codProc)->with('success','La observacion se ha registrado satisfactoriamente');
    }

    public function editar($codProc, $codDes, $codObs)
    {
        $observacion = Observacion::find($codObs);
        RegistrarActividad(Observacion::TABLA,Historial::EDITAR,'vió el formulario de editar Observacion ');
    	return view('observacion.editar', compact(['observacion', 'codDes', 'codProc']));
    }

    public function actualizar(Request $request)
    {
    	Observacion::Existe($request->codObs)->update(['titulo' => $request->titulo, 'recomendacion' => $request->recomendacion,'descripcion' => $request->informe]);
        RegistrarActividad(Observacion::TABLA,Historial::ACTUALIZAR,'actualizó la Observacion '.$request->titulo);
    	return redirect('auditor/procedimiento/mostrar/'. $request->codProc)->with('success','Observacion actualizado');	
    }

    public function eliminar( $codProc ,$codDes, $codObs)
    {
    	$observacion = Observacion::find($codObs);
        $observacion->delete();
        RegistrarActividad(Observacion::TABLA,Historial::ELIMINAR,'eliminó el observacion '.$observacion->informe);
    	return back()->with('danger','Observacion eliminado');
    }
}
