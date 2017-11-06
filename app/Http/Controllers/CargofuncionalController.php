<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CargoFuncional\ValidarRequest;
use App\Models\Cargofuncional;
use App\Models\Historial;
use Auth;

class CargofuncionalController extends Controller
{
    public function listar()
    {
    	$cargof = Cargofuncional::Activo()->get();
        RegistrarActividad(Cargofuncional::TABLA,Historial::LEER,'vió el listado de Cargos Funcionales');
    	return view('cargofuncional.listar', compact('cargof'));
    }

    public function crear()
    {
        RegistrarActividad(Cargofuncional::TABLA,Historial::CREAR,'vió el formulario de crear Cargo Funcional');
    	return view('cargofuncional.crear');
    }

    public function registrar(ValidarRequest $request)
    {
    	Cargofuncional::create(['nombre' => $request->nombre]);
        RegistrarActividad(Cargofuncional::TABLA,Historial::REGISTRAR,'registró Cargo Funcional '.$request->nombre);
    	return redirect()->route('cargof.listar')->with('success','Cargo funcional registrado');
    }

    public function editar($id)
    {
    	$cargof = Cargofuncional::Existe($id)->get();
        RegistrarActividad(Cargofuncional::TABLA,Historial::EDITAR,'vió el formulario de editar Cargo Funcional '.$actividad->nombre);
    	return view('cargofuncional.editar', compact('cargof'));
    }

    public function actualizar(ValidarRequest $request)
    {
    	Cargofuncional::Existe($request->id)->update(['nombre' => $request->nombre]);
        RegistrarActividad(Cargofuncional::TABLA,Historial::ACTUALIZAR,'actualizó Cargo Funcional '.$request->nombre);
    	return redirect()->route('cargof.listar')->with('success','Cargo funcional actualizado');	
    }

    public function eliminar($id)
    {
    	Cargofuncional::Existe($id)->update(['estado' => false]);
        RegistrarActividad(Cargofuncional::TABLA,Historial::ELIMINAR,'eliminó Cargo Funcional '.$actividad->nombre);
    	return redirect()->route('cargof.listar')->with('danger','Cargo funcional eliminado');
    }
}
