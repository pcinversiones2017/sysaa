<?php

namespace App\Http\Controllers;

use App\Http\Requests\Procesoma\ActualizarRequest;
use App\Http\Requests\Procesoma\RegistroRequest;
use App\Models\Procesoma;
use Illuminate\Http\Request;
use App\Models\Historial;
use Auth;

class ProcesomaController extends Controller
{
    public function listar()
    {
        $procesosma = Procesoma::all();
        $listarprocesosma = 'active';
        RegistrarActividad(Procesoma::TABLA,Historial::LEER,'vió el listado de Procesoma');
        return view('procesoma.listar')->with(compact('procesosma', 'listarprocesosma'));
    }

    public function crear()
    {
        $procesosma = Procesoma::all();
        RegistrarActividad(Procesoma::TABLA,Historial::CREAR,'vió el formulario de crear Procesoma');
        return view('procesoma.crear')->with(compact('procesosma'));
    }

    public function guardar(RegistroRequest $request)
    {
        $procesoma = new Procesoma();
        $procesoma->nombre = $request->nombre;
        $procesoma->estado = 'activo';
        $procesoma->codMacroP = $request->codMacroP;
        $procesoma->save();
        RegistrarActividad(Procesoma::TABLA,Historial::REGISTRAR,'registró el Procesoma '.$request->nombre);
        return redirect()->route('macroproceso.mostrar', [$request->codMacroP])->with('success','Se grabo correctamente');
    }

    public function mostrar($codProMA)
    {
        $procesoma = Procesoma::find($codProMA);
        return view('procesoma.mostrar')->with(compact('procesoma'));
    }

    public function editar(Request $request)
    {
        $procesoma = Procesoma::find($request->codProMA);
        RegistrarActividad(Procesoma::TABLA,Historial::EDITAR,'vió el formulario de editar el Procesoma '.$procesoma->nombre);
        return view('procesoma.editar')->with(compact('procesoma'));
    }

    public function actualizar(ActualizarRequest $request)
    {
        $procesoma = Procesoma::find($request-> codProMA);
        $procesoma->nombre = $request->nombre;
        $procesoma->estado = 'activo';
        $procesoma->codMacroP = $request->codMacroP;
        $procesoma->save();
        RegistrarActividad(Procesoma::TABLA,Historial::ACTUALIZAR,'actualizó el Procesoma '.$request->nombre);
        return redirect()->route('macroproceso.mostrar', [$request->codMacroP])->with('update','Se actualizo correctamente');
    }

    public function eliminar($codMacroP, $codProMA)
    {
        $procesoma = Procesoma::find($codProMA);
        $procesoma->delete();
        RegistrarActividad(Procesoma::TABLA,Historial::ELIMINAR,'eliminó el Procesoma '.$procesoma->nombre);
        return redirect()->route('macroproceso.mostrar', [$codMacroP])->with('danger','Se elimino correctamente');
    }

    public function obtener($codMacroP)
    {
        $proceso = Procesoma::where('codMacroP',$codMacroP)->get();
        return response()->json($proceso);
    }
}
