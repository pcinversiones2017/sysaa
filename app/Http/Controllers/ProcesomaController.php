<?php

namespace App\Http\Controllers;

use App\Models\Procesoma;
use Illuminate\Http\Request;

class ProcesomaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listar()
    {
        $procesosma = Procesoma::all();
        $listarprocesosma = 'active';
        return view('procesoma.listar')->with(compact('procesosma', 'listarprocesosma'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $procesosma = Procesoma::all();
        return view('procesoma.crear')->with(compact('procesosma'));
    }

    /**
     * Store a newly created resource in storage.
     *   $table->increments('codProMA');
        $table->string('nombre');
        $table->string('estado');
        $table->integer('codMacroP')->unsigned();
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        $procesoma = new Procesoma();
        $procesoma->nombre = $request->nombre;
        $procesoma->estado = 'activo';
        $procesoma->codMacroP = $request->codMacroP;
        $procesoma->save();

        return redirect('procesoma/listar');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Procesoma  $procesoMA
     * @return \Illuminate\Http\Response
     */
    public function show(Procesoma $procesoMA)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Procesoma  $procesoMA
     * @return \Illuminate\Http\Response
     */
    public function editar(Request $request)
    {
        $procesoma = Macroproceso::find($request->codProMA);
        return view('procesoma.editar')->with(compact('procesoma'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Procesoma  $procesoMA
     * @return \Illuminate\Http\Response
     */
    public function actualizar(Request $request)
    {
        $procesosma = Procesoma::find($request-> codProMA);
        $procesosma->nombre = $request->nombre;
        $procesosma->estado = $request->estado;
        $procesosma->codMacroP = $request->codMacroP;
        $procesosma->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Procesoma  $procesoMA
     * @return \Illuminate\Http\Response
     */
    public function destroy(Procesoma $procesoMA)
    {
        //
    }
}
