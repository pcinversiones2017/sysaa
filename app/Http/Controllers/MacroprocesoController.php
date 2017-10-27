<?php

namespace App\Http\Controllers;

use App\Models\Macroproceso;
use App\Models\Procesoma;
use App\Models\Subproceso;
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
        $listarmacroprocesos = 'active';
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
        $macroprocesos = 'active';
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
        $macroprocesoss = new Macroproceso();
        $macroprocesoss->nombre = $request->nombre;
        $macroprocesoss->estado = 'activo';
        $macroprocesoss->save();

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar_procesoMA(Request $request)
    {

        $macroprocesoss = new  Macroproceso();
        $macroprocesoss->nombre = $request->nombre;
        $macroprocesoss->estado = 'activo';
        $macroprocesoss->save();

        if(!empty($request->nombre)){
            $procesoma = new Procesoma();
            $procesoma->nombre = $request->nombrema;
            $procesoma->estado = 'active';
            $procesoma->codMacroP = $macroprocesoss->codMacroP;
            $procesoma->save();
        }
        return redirect('macroproceso/listar');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Macroproceso  $macroproceso
     * @return \Illuminate\Http\Response
     */
    public function editar(Request $request)
    {
        $macroproceso = Macroproceso::find($request->codMacroP);
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

        return redirect('macroproceso/listar');

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
