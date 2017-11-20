<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Archivo;
use App\Models\Historial;
use Auth;

class SeguimientoArchivoController extends Controller
{
    public function listar($codProc, $codDes, $codObs, $codSeg)
    {
    	$archivos = Archivo::Seguimiento($codSeg)->get();
        RegistrarActividad(Archivo::TABLA,Historial::LEER,'vió el listado de Archivos');
    	return view('archivo_s.listar', compact(['codProc', 'codDes', 'codObs', 'codSeg', 'archivos']));
    }

    public function crear($codProc, $codDes, $codObs, $codSeg)
    {
        RegistrarActividad(Archivo::TABLA,Historial::CREAR,'vió el formulario de cargar Archivo');
    	return view('archivo_s.crear', compact(['codProc', 'codDes', 'codObs', 'codSeg']));
    }

    public function registrar(Request $request)
    {
    	if($request->hasFile('archivo'))
        {
            $archivo = $request->file('archivo')->store('archivo','public');
            Archivo::create(['nombre' => $request->file('archivo')->getClientOriginalName(),'ruta' => $archivo, 'codSeg' => $request->codSeg ]);
            RegistrarActividad(Archivo::TABLA,Historial::ACTUALIZAR,'actualizó la Actividad '.$request->nombre);
            return redirect('seguimiento/archivo/listar/'.$request->codProc. '/'. $request->codDes. '/'. $request->codObs. '/'. $request->codSeg)->with('success','Archivo cargado');
        }else
        {
            return back()->with('danger','Debe cargar un archivo');
        }
    }

    public function descargar($id)
    {
        $archivo = Archivo::Existe($id)->get();
        foreach($archivo as $row):
            $descargar  = storage_path('/app/public/'.$row->ruta);
        endforeach;
        return response()->download($descargar);
    }

    public function eliminar($id)
    {
    	$archivo = Archivo::find($id);
        $archivo->delete();
        RegistrarActividad(Archivo::TABLA,Historial::ELIMINAR,'eliminó el Archivo '.$archivo->nombre);
    	return back()->with('danger','Archivo Eliminado');
    }
}
