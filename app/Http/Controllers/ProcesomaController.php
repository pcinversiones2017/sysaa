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
            return redirect()->route('macroproceso.mostrar', [$request->codMacroP])->with('success','Se grabo correctamente');
    }

    /**s
     * Display the specified resource.
     *
     * @param  \App\Models\Procesoma  $procesoMA
     * @return \Illuminate\Http\Response
     */
    public function mostrar($codProMA)
    {
        $procesoma = Procesoma::find($codProMA);
        return view('procesoma.mostrar')->with(compact('procesoma'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Procesoma  $procesoMA
     * @return \Illuminate\Http\Response
     */
    public function editar(Request $request)
    {
        $procesoma = Procesoma::find($request->codProMA);
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
        $procesoma = Procesoma::find($request-> codProMA);
        $procesoma->nombre = $request->nombre;
        $procesoma->estado = 'activo';
        $procesoma->codMacroP = $request->codMacroP;
        $procesoma->save();
        return redirect()->route('macroproceso.mostrar', [$request->codMacroP])->with('update','Se actualizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Procesoma  $procesoMA
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Request $request)
    {
        try{
            $procesoma = Procesoma::find($request->codProMA);
            $procesoma->delete();
            //return redirect()->route('macroproceso.mostrar', [$request->codMacroP])->with('update','Se actualizo correctamente');

            return redirect()->route('macroproceso.listar')->with('danger','Se elimino correctamente');
        }catch (\Exception $e){

        }
    }
}
