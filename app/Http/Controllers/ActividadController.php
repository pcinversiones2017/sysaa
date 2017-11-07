<?php

namespace App\Http\Controllers;
use App\Http\Requests\Actividad\ActualizarRequest;
use App\Http\Requests\Actividad\RegistroRequest;
use App\Models\Actividad;
use Illuminate\Http\Request;
use App\Models\Historial;
use Auth;

class ActividadController extends Controller
{
    public function listar()
    {
        $actividad = Actividad::all();
        $listarActividad = 'active';
        RegistrarActividad(Actividad::TABLA,Historial::LEER,'vió el listado de Actividades');
        return view('actividad.listar')->with(compact('actividad','listarActividad'));
    }

    public function crear()
    {
        $actividad = 'active';
        RegistrarActividad(Actividad::TABLA,Historial::CREAR,'vió el formulario de crear Actividad');
        return view('actividad.crear')->with(compact('actividad'));
    }

    public function guardar(RegistroRequest $request)
    {
        $actividad = new Actividad();
        $actividad->responsable = $request->responsable;
        $actividad->nombre = $request->nombre;
        $actividad->codProSP = $request->codProSP;
        $actividad->save();
        RegistrarActividad(Actividad::TABLA,Historial::REGISTRAR,'registró la Actividad ' . $request->nombre);
        return redirect()->route('procedimientosp.mostrar', [$request->codProSP])->with('success', 'Se grabo correctamente');
    }

    public function mostrar($codAct)
    {
        $actividad = Actividad::find($codAct);
        return view('actividad.mostrar')->with(compact('actividad'));
    }

    public function editar(Request $request)
    {
        $actividad = Actividad::find($request->codAct);
        RegistrarActividad(Actividad::TABLA,Historial::EDITAR,'vió el formulario de editar la Actividad ' . $actividad->nombre);
        return view('actividad.editar')->with(compact('actividad'));
    }

    public function actualizar(ActualizarRequest $request)
    {
        $actividad = Actividad::find($request->codAct);
        $actividad->responsable = $request->responsable;
        $actividad->nombre = $request->nombre;
        $actividad->codProSP = $request->codProSP;
        $actividad->save();
        RegistrarActividad(Actividad::TABLA,Historial::ACTUALIZAR,'actualizó la Actividad ' . $request->nombre);
        return redirect()->route('procedimientosp.mostrar', [$request->codProSP])->with('update','Se actualizo correctamente');
    }

    public function eliminar(Request $request)
    {
        try{
            $actividad = Actividad::find($request->codAct);
            $actividad->delete();
            RegistrarActividad(Actividad::TABLA,Historial::ELIMINAR,'eliminó la Actividad ' . $actividad->nombre);
            return redirect()->route('procedimientosp.mostrar', $actividad->procedimientoSP->codProSP)->with('danger','Se elimino correctamente');
        }catch (\Exception $e){

        }
    }
}
