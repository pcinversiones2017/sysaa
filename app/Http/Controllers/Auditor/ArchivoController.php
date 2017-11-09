<?php

namespace App\Http\Controllers\Auditor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Archivo;
use App\Models\Historial;
use Auth;

class ArchivoController extends Controller
{
    public function listar($codProc, $codDes, $codObs)
    {
    	$archivos = Archivo::Desarrollo($codObs)->get();
        RegistrarActividad(Archivo::TABLA,Historial::LEER,'vió el listado de Archivos');
    	return view('auditor.archivo.listar', compact(['archivos','codDes', 'codObs', 'codProc']));
    }

    public function crear($codProc, $codDes, $codObs)
    {
        RegistrarActividad(Archivo::TABLA,Historial::CREAR,'vió el formulario de cargar Archivo');
    	return view('auditor.archivo.crear', compact(['codDes', 'codObs', 'codProc']));
    }

    public function registrar(Request $request)
    {
    	if($request->hasFile('archivo'))
        {
            $archivo = $request->file('archivo')->store('archivo','public');
            Archivo::create(['nombre' => $request->file('archivo')->getClientOriginalName(),'ruta' => $archivo, 'codObs' => $request->codObs ]);
            RegistrarActividad(Archivo::TABLA,Historial::ACTUALIZAR,'registró el archivo '.$request->nombre);
            return redirect('auditor/observacion/archivo/listar/'.$request->codProc. '/'.$request->codDes. '/'. $request->codObs)->with('success','Archivo cargado');
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
