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
        $actividades = Actividad::all();
        $listarActividad = 'active';
        return view('actividad.listar')->with(compact('actividades','listarActividad'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $crearActividad = 'active';
        return view('actividad.crear')->with(compact('crearActividad'));
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
        $actividad->nombre = $request->nombre;
        $actividad->responsable = $request->responsable;
        $actividad->codProSP = $request->codProSP;
        $actividad->save();

        return redirect('actividad/listar');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function show(Actividad $actividad)
    {
        //
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function actualizar(Request $request)
    {
        $actividad = Actividad::find($request->codAct);
        $actividad->nombre = $request->nombre;
        $actividad->responsable = $request->responsable;
        $actividad->codProSP = $request->codProSP;
        $actividad->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Actividad $actividad)
    {
        //
    }
}
