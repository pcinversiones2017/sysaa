<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informe;
use App\Models\Procedimiento;
use App\Models\Historial;
use Auth;

class InformeController extends Controller
{
    public function listar()
    {
    	$informe = Informe::join('procedimiento', 'procedimiento.codProc', '=', 'informe.codProc')
                            ->where('procedimiento.codUsuRol',Auth::user()->usuariorol->codUsuRol)
                            ->get();
        RegistrarActividad(Informe::TABLA,Historial::LEER,'vió el listado de Informes');
    	return view('informe.listar', compact(['informe']));
    }

    public function crear($codProc)
    {
        $codProc = $codProc;
        RegistrarActividad(Informe::TABLA,Historial::CREAR,'vió el formulario de crear Informe');
    	return view('informe.crear', compact(['codProc']));
    }

    public function registrar(Request $request)
    {
    	Informe::create(['informe' => $request->informe, 'elaborado' => date("Y-m-d"), 'codProc' => $request->codProc]);
        RegistrarActividad(Informe::TABLA,Historial::REGISTRAR,'registró el Informe '.$request->nombre);
    	return redirect('auditor/informe/listar')->with('success','Informe registrado');
    }

    public function editar($id)
    {
        $informe = Informe::Existe($id)->get();
        RegistrarActividad(Informe::TABLA,Historial::EDITAR,'vió el formulario de editar Informe ');
    	return view('informe.editar', compact('informe'));
    }

    public function actualizar(Request $request)
    {
    	Informe::Existe($request->codInf)->update(['informe' => $request->informe, 'elaborado' => date("Y-m-d")]);
        RegistrarActividad(Informe::TABLA,Historial::ACTUALIZAR,'actualizó el Informe '.$request->nombre);
    	return redirect('auditor/informe/listar')->with('success','Informe actualizado');	
    }

    public function eliminar($id)
    {
    	$informe = Informe::find($id);
        $informe->delete();
        RegistrarActividad(Informe::TABLA,Historial::ELIMINAR,'eliminó el Informe '.$informe->informe);
    	return back()->with('danger','Informe eliminado');
    }
}
