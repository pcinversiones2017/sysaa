<?php

namespace App\Http\Controllers;

use App\Models\Subproceso;
use Illuminate\Http\Request;

class SubprocesoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listar()
    {
        $subproceso = Subproceso::all();
        $listarSubproceso = 'active';
        return view('subproceso.listar')->with(compact('subproceso','listarSubproceso'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $crearSubProceso = 'active';
        return view('subproceso.crear')->with(compact('crearSubProceso'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * $table->increments('codSubPro');
        $table->string('name');
        $table->string('estado');
        $table->integer('codProMA')->unsigned();
        $table->timestamp('fecha_creado')->nullable();
        $table->timestamp('fecha_modificado')->nullable();
        $table->foreign('codProMA')->references('codProMA')->on('Proceso_MA');
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        $subProceso = new Subproceso();
        $subProceso-> nombre = $request->nombre;
        $subProceso-> estado = 'active';
        $subProceso-> codProMA = $request->codProMA;
        $subProceso->save();

        return redirect('subproceso/listar');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subproceso  $subproceso
     * @return \Illuminate\Http\Response
     */
    public function mostrar(Subproceso $subproceso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subproceso  $subproceso
     * @return \Illuminate\Http\Response
     */
    public function editar(Request $request)
    {
        $subProceso = Subproceso::find($request->codSubPro);
        return view ('subproceso.editar')->with(compact('subProceso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subproceso  $subproceso
     * @return \Illuminate\Http\Response
     */
    public function actualizar(Request $request, Subproceso $subproceso)
    {
        $subProceso = Subproceso::find($request->codSubPro);
        $subProceso->nombre = $request->nombre;
        $subProceso->estado = $request->estado;
        $subProceso-> codProMA = $request->codProMA;
        $subProceso->save();

        return redirect('subproceso/listar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subproceso  $subproceso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subproceso $subproceso)
    {
        //
    }
}
