<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Archivo;

class ArchivoController extends Controller
{
    public function listar($codPlanF, $codObjEsp, $codProc, $codInf)
    {
    	$archivos = Archivo::Informe($codInf)->get();
    	return view('archivo.listar', compact(['archivos', 'codPlanF', 'codObjEsp', 'codProc', 'codInf']));
    }

    public function crear($codPlanF, $codObjEsp, $codProc, $codInf)
    {
        $codPlanF   = $codPlanF;
        $codObjEsp  = $codObjEsp;
        $codProc    = $codProc;
        $codInf     = $codInf;
    	return view('archivo.crear', compact(['codPlanF', 'codObjEsp', 'codProc', 'codInf']));
    }

    public function registrar(Request $request)
    {
    	if($request->hasFile('archivo'))
        {
            $archivo = $request->file('archivo')->store('archivo','public');
            Archivo::create(['nombre' => $request->file('archivo')->getClientOriginalName(),'ruta' => $archivo, 'codInf' => $request->codInf ]);
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
    	return back()->with('danger','Archivo Eliminado');
    }
}
