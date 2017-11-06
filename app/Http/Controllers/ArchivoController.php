<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Archivo;
use App\Models\Historial;
use Auth;

class ArchivoController extends Controller
{
    public function listar($codPlanF, $codObjEsp, $codProc, $codInf)
    {
    	$archivos = Archivo::Informe($codInf)->get();
        RegistrarActividad(Archivo::TABLA,Historial::LEER,'vió el listado de Archivos');
    	return view('archivo.listar', compact(['archivos', 'codPlanF', 'codObjEsp', 'codProc', 'codInf']));
    }

    public function crear($codPlanF, $codObjEsp, $codProc, $codInf)
    {
        $codPlanF   = $codPlanF;
        $codObjEsp  = $codObjEsp;
        $codProc    = $codProc;
        $codInf     = $codInf;
        RegistrarActividad(Archivo::TABLA,Historial::CREAR,'vió el formulario de cargar Archivo');
    	return view('archivo.crear', compact(['codPlanF', 'codObjEsp', 'codProc', 'codInf']));
    }

    public function registrar(Request $request)
    {
    	if($request->hasFile('archivo'))
        {
            $archivo = $request->file('archivo')->store('archivo','public');
            Archivo::create(['nombre' => $request->file('archivo')->getClientOriginalName(),'ruta' => $archivo, 'codInf' => $request->codInf ]);
            RegistrarActividad(Archivo::TABLA,Historial::ACTUALIZAR,'actualizó la Actividad '.$request->nombre);
            return redirect('archivo/listar/'.$request->codPlanF.'/'.$request->codObjEsp.'/'.$request->codProc.'/'.$request->codInf)->with('success','Archivo cargado');
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
    	$archivo = Archivo::Existe($id)->delete();
        RegistrarActividad(Archivo::TABLA,Historial::ELIMINAR,'eliminó el Archivo '.$archivo->nombre);
    	return back()->with('danger','Archivo Eliminado');
    }
}
