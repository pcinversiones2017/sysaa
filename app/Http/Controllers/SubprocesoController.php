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
        return redirect()->route('procesoma.mostrar', [$request->codProMA])->with('success','Se grabo correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subproceso  $subproceso
     * @return \Illuminate\Http\Response
     */
    public function mostrar($codSubPro)
    {
        $subproceso = Subproceso::find($codSubPro);
        return view('subproceso.mostrar')->with(compact('subproceso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subproceso  $subproceso
     * @return \Illuminate\Http\Response
     */
    public function editar(Request $request)
    {
        $subproceso = Subproceso::find($request->codSubPro);
        return view ('subproceso.editar')->with(compact('subproceso'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subproceso  $subproceso
     * @return \Illuminate\Http\Response
     */
    public function actualizar(Request $request)
    {
        $subproceso = Subproceso::find($request->codSubPro);
        $subproceso->nombre = $request->nombre;
        $subproceso->estado = 'activo';
        $subproceso-> codProMA = $request->codProMA;
        $subproceso->save();
        return redirect()->route('procesoma.mostrar', [$request->codProMA])->with('update','Se actualizo correctamente');
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
