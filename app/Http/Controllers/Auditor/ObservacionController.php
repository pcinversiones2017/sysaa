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
    	$observacion = Observacion::join('informe', 'informe.codProc', '=', 'observacion.codProc')
                            ->where('informe.codUsuRol',Auth::user()->usuariorol->codUsuRol)
                            ->get();
        RegistrarActividad(Observacion::TABLA,Historial::LEER,'vió el listado de Observaciones');
    	return view('observacion.listar', compact(['observacion']));
    }

    public function crear($codDes)
    {
        RegistrarActividad(Observacion::TABLA,Historial::CREAR,'vió el formulario de crear Observacion');
    	return view('observacion.crear', compact(['codDes']));
    }

    public function registrar(Request $request)
    {
    	Observacion::create(['descripcion' => $request->descripcion, 'elaborado' => date("Y-m-d"), 'codDes' => $request->codDes]);
        RegistrarActividad(Observacion::TABLA,Historial::REGISTRAR,'registró la Observacion '.$request->nombre);
    	return redirect('auditor/observacion/listar')->with('success','Observacion registrado');
    }

    public function editar($id)
    {
        $observacion = Observacion::Existe($id)->get();
        RegistrarActividad(Observacion::TABLA,Historial::EDITAR,'vió el formulario de editar Observacion ');
    	return view('observacion.editar', compact('observacion'));
    }

    public function actualizar(Request $request)
    {
    	Observacion::Existe($request->codObs)->update(['descripcion' => $request->descripcion, 'elaborado' => date("Y-m-d")]);
        RegistrarActividad(Observacion::TABLA,Historial::ACTUALIZAR,'actualizó la Observacion '.$request->descripcion);
    	return redirect('auditor/observacion/listar')->with('success','Desarrollo actualizado');	
    }

    public function eliminar($id)
    {
    	$observacion = Observacion::find($id);
        $observacion->delete();
        RegistrarActividad(Observacion::TABLA,Historial::ELIMINAR,'eliminó el observacion '.$observacion->informe);
    	return back()->with('danger','Desarrollo eliminado');
    }
}
