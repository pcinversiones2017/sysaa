<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Desarrollo;
use App\Models\Procedimiento;
use App\Models\Historial;
use Auth;

class DesarrolloController extends Controller
{
    public function listar()
    {
    	$desarrollo = Desarrollo::join('procedimiento', 'procedimiento.codProc', '=', 'desarrollo.codProc')
                            ->where('procedimiento.codUsuRol',Auth::user()->usuariorol->codUsuRol)
                            ->get();
        RegistrarActividad(Desarrollo::TABLA,Historial::LEER,'vió el listado de Desarrollos');
    	return view('desarrollo.listar', compact(['desarrollo']));
    }

    public function crear($codProc)
    {
        $codProc = $codProc;
        RegistrarActividad(Desarrollo::TABLA,Historial::CREAR,'vió el formulario de crear Desarrollo');
    	return view('desarrollo.crear', compact(['codProc']));
    }

    public function registrar(Request $request)
    {
    	Desarrollo::create(['informe' => $request->informe, 'elaborado' => date("Y-m-d"), 'codProc' => $request->codProc]);
        RegistrarActividad(Desarrollo::TABLA,Historial::REGISTRAR,'registró el Desarrollo '.$request->nombre);
    	return redirect('auditor/desarrollo/listar')->with('success','Desarrollo registrado');
    }

    public function editar($id)
    {
        $desarrollo = Desarrollo::Existe($id)->get();
        RegistrarActividad(Desarrollo::TABLA,Historial::EDITAR,'vió el formulario de editar Desarrollo ');
    	return view('desarrollo.editar', compact('desarrollo'));
    }

    public function actualizar(Request $request)
    {
    	Desarrollo::Existe($request->codDes)->update(['informe' => $request->informe, 'elaborado' => date("Y-m-d")]);
        RegistrarActividad(Desarrollo::TABLA,Historial::ACTUALIZAR,'actualizó el Desarrollo '.$request->informe);
    	return redirect('auditor/desarrollo/listar')->with('success','Desarrollo actualizado');	
    }

    public function eliminar($id)
    {
    	$desarrollo = Desarrollo::find($id);
        $desarrollo->delete();
        RegistrarActividad(Desarrollo::TABLA,Historial::ELIMINAR,'eliminó el Desarrollo '.$desarrollo->informe);
    	return back()->with('danger','Desarrollo eliminado');
    }
}
