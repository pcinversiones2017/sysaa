<?php

namespace App\Http\Controllers;
use App\Models\Actividad;
use Illuminate\Http\Request;

class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listar()
    {
        $actividad = Actividad::all();
        $listarActividad = 'active';
        return view('actividad.listar')->with(compact('actividad','listarActividad'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $actividad = 'active';
        return view('actividad.crear')->with(compact('actividad'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        $actividad = new Actividad();
        $actividad->responsable = $request->responsable;
        $actividad->nombre = $request->nombre;
        $actividad->codProSP = $request->codProSP;
        $actividad->save();
        return redirect()->route('procedimientosp.mostrar', [$request->codProSP])->with('success','Se grabo correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function mostrar($codAct)
    {
        $actividad = Actividad::find($codAct);
        return view('actividad.mostrar')->with(compact('actividad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function editar(Request $request)
    {
        $actividad = Actividad::find($request->codAct);
        return view('actividad.editar')->with(compact('actividad'));
    }

    public function actualizar(Request $request)
    {
        $actividad = Actividad::find($request->codAct);
        $actividad->responsable = $request->responsable;
        $actividad->nombre = $request->nombre;
        $actividad->codProSP = $request->codProSP;
        $actividad->save();
        return redirect()->route('procedimientosp.mostrar', [$request->codProSP])->with('update','Se actualizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Request $request)
    {
        try{
            $actividad = Actividad::find($request->codAct);
            $actividad->delete();
            //return redirect()->route('macroproceso.mostrar', [$request->codMacroP])->with('update','Se actualizo correctamente');

            return redirect()->route('macroproceso.listar')->with('danger','Se elimino correctamente');
        }catch (\Exception $e){

        }
    }
}
