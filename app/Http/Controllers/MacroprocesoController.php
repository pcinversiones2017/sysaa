<?php

namespace App\Http\Controllers;

use App\Models\Macroproceso;
use App\Models\Plan;
use Illuminate\Http\Request;

class MacroprocesoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listar()
    {
        $macroprocesos = Macroproceso::all();
        $listarmacroprocesos = 'activo';
        return view('macroproceso.listar')->with(compact('macroprocesos','listarmacroprocesos'));
    }

    /**
     * Show the form for creating a new resource.
     *      $table->increments('codMacroP');
            $table->string('nombre');
            $table->string('estado');
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $macroprocesos = Macroproceso::all();
        return view('macroproceso.crear')->with(compact('macroprocesos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        $macroproceso = new Macroproceso();
        $macroproceso->nombre = $request->nombre;
        $macroproceso->estado = 'activo';
        $macroproceso->save();

        return redirect('macroproceso/listar');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Macroproceso  $macroproceso
     * @return \Illuminate\Http\Response
     */
    public function mostrar(Request $request)
    {
        $macroproceso = Macroproceso::find($request->codMacroP);
        return view('macroproceso.mostrar')->with(compact('macroproceso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Macroproceso  $macroproceso
     * @return \Illuminate\Http\Response
     */
    public function editar(Request $request)
    {
        $macroproceso = Plan::find($request->codMacroP);
        return view('macroproceso.editar')->with(compact('macroproceso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Macroproceso  $macroproceso
     * @return \Illuminate\Http\Response
     */
    public function actualizar(Request $request)
    {
        $macroproceso = Macroproceso::find($request->codMacroP);
        $macroproceso->nombre = $request->nombre;
        $macroproceso->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Macroproceso  $macroproceso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Macroproceso $macroproceso)
    {
        //
    }
}
