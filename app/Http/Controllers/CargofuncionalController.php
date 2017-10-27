<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CargoFuncional\ValidarRequest;
use App\Models\Cargofuncional;

class CargofuncionalController extends Controller
{
    public function listar()
    {
    	$cargof = Cargofuncional::Activo()->get();
    	return view('cargofuncional.listar', compact('cargof'));
    }

    public function crear()
    {
    	return view('cargofuncional.crear');
    }

    public function registrar(ValidarRequest $request)
    {
    	Cargofuncional::create(['nombre' => $request->nombre]);
    	return redirect()->route('cargof.listar')->with('success','Cargo funcional registrado');
    }

    public function editar($id)
    {
    	$cargof = Cargofuncional::Existe($id)->get();
    	return view('cargofuncional.editar', compact('cargof'));
    }

    public function actualizar(ValidarRequest $request)
    {
    	Cargofuncional::Existe($request->id)->update(['nombre' => $request->nombre]);
    	return redirect()->route('cargof.listar')->with('success','Cargo funcional actualizado');	
    }

    public function eliminar($id)
    {
    	Cargofuncional::Existe($id)->update(['estado' => false]);
    	return redirect()->route('cargof.listar')->with('danger','Cargo funcional eliminado');
    }
}
