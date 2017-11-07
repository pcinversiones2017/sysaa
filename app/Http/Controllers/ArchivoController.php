<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Archivo;
use App\Models\Historial;
use Auth;

class ArchivoController extends Controller
{
    public function listar($codDes)
    {
    	$archivos = Archivo::Informe($codDes)->get();
        RegistrarActividad(Archivo::TABLA,Historial::LEER,'vió el listado de Archivos');
    	return view('archivo.listar', compact(['archivos','codDes']));
    }

    public function crear($codDes)
    {
        RegistrarActividad(Archivo::TABLA,Historial::CREAR,'vió el formulario de cargar Archivo');
    	return view('archivo.crear', compact(['codDes']));
    }

    public function registrar(Request $request)
    {
    	if($request->hasFile('archivo'))
        {
            $archivo = $request->file('archivo')->store('archivo','public');
            Archivo::create(['nombre' => $request->file('archivo')->getClientOriginalName(),'ruta' => $archivo, 'codDes' => $request->codDes ]);
            RegistrarActividad(Archivo::TABLA,Historial::ACTUALIZAR,'actualizó la Actividad '.$request->nombre);
            return redirect('auditor/archivo/listar/'.$request->codDes)->with('success','Archivo cargado');
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
