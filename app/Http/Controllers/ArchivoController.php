<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Archivo;

class ArchivoController extends Controller
{
    public function listar()
    {
    	$archivos = Archivo::Activo()->get();
    	return view('archivo.listar', compact('archivo'));
    }

    public function crear()
    {
    	return view('archivo.crear');
    }

    public function registrar(Request $request)
    {
    	
    }

    public function editar($id)
    {
    	$archivo = Archivo::Existe($id)->get();
    	return view('archivo.editar', compact('archivo'));
    }

    public function actualizar(Request $request)
    {
    	
    }

    public function eliminar($id)
    {
    	$archivo = Archivo::Existe($id)->get();
    	return redirect()->route('archivo.listar')->with('danger','Archivo Eliminado');
    }
}
