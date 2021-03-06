<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProcedimientoSP\ActualizarRequest;
use App\Http\Requests\ProcedimientoSP\RegistroRequest;
use App\Models\Procedimientosp;
use Illuminate\Http\Request;
use App\Models\Historial;
use Auth;

class ProcedimientospController extends Controller
{
    public function listar()
    {
        $prodecimientossp = Procedimientosp::all();
        RegistrarActividad(Procedimientosp::TABLA,Historial::LEER,'vió el listado de Procesos');
        return view('procedimientosp.listar')->with(compact('prodecimientossp'));
    }

    public function crear()
    {
        $crearProcedimientosp = 'active';
        RegistrarActividad(Procedimientosp::TABLA,Historial::CREAR,'vió el formulario de crear Procesoma');
        return view('procedimientosp.crear')->with(compact('crearProcedimientosp'));
    }

    public function guardar(RegistroRequest $request)
    {
        $procedimientoSP = new Procedimientosp();
        $procedimientoSP->nombre = $request->nombre;
        $procedimientoSP->riesgo = $request->riesgo;
        $procedimientoSP->ponderacion = $request->ponderacion;
        $procedimientoSP->codSubPro = $request->codSubPro;
        $procedimientoSP->save();
        RegistrarActividad(Procedimientosp::TABLA,Historial::REGISTRAR,'registró el Procesoma '.$request->nombre);
        return redirect()->route('subproceso.mostrar', [$request->codSubPro])->with('success','Se grabo correctamente');
    }

    public function mostrar($codProSP)
    {
        $procedimientosp = Procedimientosp::find($codProSP);
        RegistrarActividad(Procedimientosp::TABLA,Historial::EDITAR,'vió el formulario de editar Procesoma '. $procedimientosp->nombre);
        return view('procedimientosp.mostrar')->with(compact('procedimientosp'));
    }

    public function editar(Request $request)
    {
        $procedimientosp = Procedimientosp::find($request->codProSP);
        RegistrarActividad(Procedimientosp::TABLA,Historial::ACTUALIZAR,'actualizó el Procesoma ' . $procedimientosp->nombre);
        return view('procedimientosp.editar')->with(compact('procedimientosp'));
    }

    public function actualizar(ActualizarRequest $request, Procedimientosp $procedimientosp)
    {
        $procedimientosp = Procedimientosp::find($request->codProSP);
        $procedimientosp->nombre = $request->nombre;
        $procedimientoSP->riesgo = $request->riesgo;
        $procedimientoSP->ponderacion = $request->ponderacion;
        $procedimientosp->codSubPro = $request-> codSubPro;
        $procedimientosp->save();
        RegistrarActividad(Procedimientosp::TABLA,Historial::ACTUALIZAR,'actualizó el Procesoma '.$request->nombre);
        return redirect()->route('subproceso.mostrar', [$request->codSubPro])->with('update','Se actualizo correctamente');
    }

    public function eliminar(Request $request)
    {
        try{
            $procedimientosp = Procedimientosp::find($request->codProSP);
            $procedimientosp->delete();
            RegistrarActividad(Procedimientosp::TABLA,Historial::ELIMINAR,'eliminó el Procesoma '.$procedimientosp->nombre);

            return redirect()->route('subproceso.mostrar', $procedimientosp->subProceso->codSubPro)->with('danger','Se elimino correctamente');
        }catch (\Exception $e){

        }
    }
}
