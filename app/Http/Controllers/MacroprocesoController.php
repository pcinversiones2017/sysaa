<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\Macroproceso\ValidarRequest;
use App\Models\Macroproceso;
use App\Models\Historial;

class MacroprocesoController extends Controller
{
    public function listar()
    {
        $macroprocesos = Macroproceso::all();
        $listarmacroprocesos = 'active';
        RegistrarActividad(Macroproceso::TABLA,Historial::LEER,'vió el listado de Macroprocesos');
        return view('macroproceso.listar', compact(['macroprocesos','listarmacroprocesos']));
    }

    public function crear()
    {
        $macroprocesos = 'active';
        RegistrarActividad(Macroproceso::TABLA,Historial::CREAR,'vió el formulario de crear Macroproceso');
        return view('macroproceso.crear', compact('macroprocesos'));
    }

    public function guardar(ValidarRequest $request)
    {
        $macroprocesoss = new Macroproceso();
        $macroprocesoss->nombre = $request->nombre;
        $macroprocesoss->estado = 'activo';
        $macroprocesoss->save();
        RegistrarActividad(Macroproceso::TABLA,Historial::REGISTRAR,'registró el Macroproceso '.$request->nombrePlan);
        return redirect('macroproceso/listar')->with('success', 'Se registro nuevo Macroproceso');
    }

    public function mostrar($codMacroP)
    {
        $macroproceso = Macroproceso::find($codMacroP);
        RegistrarActividad(Macroproceso::TABLA,Historial::EDITAR,'vió el formulario de editar el Macroproceso '.$macroproceso->nombrePlan);
        return view('macroproceso.mostrar', compact('macroproceso'));
    }

    public function editar(Request $request)
    {
        $macroproceso = Macroproceso::find($request->codMacroP);
        RegistrarActividad(Macroproceso::TABLA,Historial::ACTUALIZAR,'actualizó el Macroproceso '.$macroproceso->nombrePlan);
        return view('macroproceso.editar', compact('macroproceso'));
    }

    public function actualizar(ValidarRequest $request)
    {
        $macroproceso = Macroproceso::find($request->codMacroP);
        $macroproceso->nombre = $request->nombre;
        $macroproceso->save();
        RegistrarActividad(Macroproceso::TABLA,Historial::ACTUALIZAR,'actualizó el Macroproceso '.$macroproceso->nombrePlan);
        return redirect('macroproceso/listar')->with('success', 'Se actualizo el Macroproceso');
    }

    public function eliminar($codMacroP)
    {
        $macroproceso = Macroproceso::find($codMacroP);
        $macroproceso->delete();
        RegistrarActividad(Macroproceso::TABLA,Historial::ELIMINAR,'eliminó el Macroproceso '.$macroproceso->nombre);
        return back()->with('danger', 'Macroproceso Eliminado');
    }
}
