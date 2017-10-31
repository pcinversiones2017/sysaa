<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Archivo;

class ArchivoController extends Controller
{
    public function listar()
    {
    	$archivos = Archivo::Activo()->get();
    	return view('archivo.listar', compact('archivos'));
    }

    public function crear()
    {
    	return view('archivo.crear');
    }

    public function registrar(Request $request)
    {
    	if($request->hasFile('archivo'))
        {
            $archivo = $request->file('archivo')->store('archivo','public');
            Archivo::create(['nombre' => $archivo, 'codInf' => 0 ]);
            return redirect()->route('archivo.listar')->with('success','Archivo cargado');
        }else
        {
            return redirect()->route('archivo.listar')->with('danger','Debe cargar un archivo');
        }
    }

    public function descargar($id)
    {
        $archivo = Archivo::Existe($id)->get();
        foreach($archivo as $row):
            $descargar  = storage_path().$row->nombre;
        endforeach;
        return response()->download($descargar);
    }

    public function eliminar($id)
    {
    	$archivo = Archivo::Existe($id)->update(['estado' => false]);
    	return redirect()->route('archivo.listar')->with('danger','Archivo Eliminado');
    }
}
