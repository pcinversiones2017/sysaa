<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\Macroproceso\ValidarRequest;
use App\Models\Macroproceso;
use App\Models\Historial;
use Auth;

class MacroprocesoController extends Controller
{
    public function listar()
    {
        $macroprocesos = Macroproceso::all();
        $listarMacroprocesos = 'active';
        RegistrarActividad(Macroproceso::TABLA,Historial::LEER,'vió el listado de Macroprocesos');
        return view('macroproceso.listar', compact(['macroprocesos','listarMacroprocesos']));
    }

    public function crear()
    {
        $crearMacroproceso = 'active';
        RegistrarActividad(Macroproceso::TABLA,Historial::CREAR,'vió el formulario de crear Macroproceso');
        return view('macroproceso.crear', compact('macroprocesos', 'crearMacroproceso'));
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

    public function general()
    {
        $general = Macroproceso::join('proceso_ma', 'proceso_ma.codMacroP','=','macroproceso.codMacroP')
                    ->join('subproceso', 'subproceso.codProMA', '=', 'proceso_ma.codProMA')
                    ->join('procedimiento_sp', 'procedimiento_sp.codSubPro', '=', 'subproceso.codSubPro')
                    ->join('actividad', 'actividad.codProSP', '=', 'procedimiento_sp.codProSP')
                    ->select('macroproceso.nombre as macronom', 'proceso_ma.nombre as pronom', 'proceso_ma.riesgo as prories', 'proceso_ma.ponderacion as propon', 'subproceso.nombre as subnom', 'subproceso.riesgo as subries', 'subproceso.ponderacion as subpon', 'procedimiento_sp.nombre as procenom', 'procedimiento_sp.riesgo as proceries', 'procedimiento_sp.ponderacion as procepon', 'actividad.responsable as actres', 'actividad.nombre as actnom')
                    ->get();
        $listarGeneral = 'active';
        return view('macroproceso.general', compact(['general', 'listarGeneral']));
    }
}
