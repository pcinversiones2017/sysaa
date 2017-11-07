<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subproceso;
use App\Models\Historial;
use Auth;

class SubprocesoController extends Controller
{
    public function listar()
    {
        $subproceso = Subproceso::all();
        $listarSubproceso = 'active';
        RegistrarActividad(Subproceso::TABLA,Historial::LEER,'vió el listado de SubProceso');
        return view('subproceso.listar')->with(compact('subproceso','listarSubproceso'));
    }

    public function crear()
    {
        $crearSubProceso = 'active';
        RegistrarActividad(Subproceso::TABLA,Historial::CREAR,'vió el formulario de crear SubProceso');
        return view('subproceso.crear')->with(compact('crearSubProceso'));
    }

    public function guardar(Request $request)
    {
        $subProceso = new Subproceso();
        $subProceso-> nombre = $request->nombre;
        $subProceso-> estado = 'active';
        $subProceso-> codProMA = $request->codProMA;
        $subProceso->save();
        RegistrarActividad(Subproceso::TABLA,Historial::REGISTRAR,'registró el SubProceso '.$request->nombre);
        return redirect()->route('procesoma.mostrar', [$request->codProMA])->with('success','Se grabo correctamente');
    }

    public function mostrar($codSubPro)
    {
        $subproceso = Subproceso::find($codSubPro);
        return view('subproceso.mostrar')->with(compact('subproceso'));
    }

    public function editar(Request $request)
    {
        $subproceso = Subproceso::find($request->codSubPro);
        RegistrarActividad(Subproceso::TABLA,Historial::EDITAR,'vió el formulario de editar el SubProceso '.$subproceso->nombre);
        return view ('subproceso.editar')->with(compact('subproceso'));

    }

    public function actualizar(Request $request)
    {
        $subproceso = Subproceso::find($request->codSubPro);
        $subproceso->nombre = $request->nombre;
        $subproceso->estado = 'activo';
        $subproceso-> codProMA = $request->codProMA;
        $subproceso->save();
        RegistrarActividad(Subproceso::TABLA,Historial::ACTUALIZAR,'actualizó el SubProceso '.$request->nombre);
        return redirect()->route('procesoma.mostrar', [$request->codProMA])->with('update','Se actualizo correctamente');
    }

    public function eliminar(Request $request)
    {
        try{
            $subproceso = Subproceso::find($request->codSubPro);
            $subproceso->delete();
            RegistrarActividad(Subproceso::TABLA,Historial::ELIMINAR,'eliminó el SubProceso '.$subproceso->nombre);

            return redirect()->route('procesoma.mostrar', $subproceso->procesoMA->codProMA)->with('danger','Se elimino correctamente');
        }catch (\Exception $e){

        }
    }
}
