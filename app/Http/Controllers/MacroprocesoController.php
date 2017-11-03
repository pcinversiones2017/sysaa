<?php

namespace App\Http\Controllers;
use App\Models\Macroproceso;
use Illuminate\Http\Request;
use App\Http\Requests\Plan\ActualizarRequest;
use App\Http\Requests\Plan\RegistroRequest;


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
    public function mostrar($codMacroP)
    {
        $macroproceso = Macroproceso::find($codMacroP);
        return view('macroproceso.mostrar')->with(compact('macroproceso'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

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
        return redirect()->route('macroproceso.listar')->with('update','Se actualizo correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Macroproceso  $macroproceso
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Request $request)
    {
        try{
            $macroproceso = Macroproceso::find($request->codMacroP);
            $macroproceso->delete();
            return redirect()->route('macroproceso.listar')->with('danger', 'Macroproceso Eliminado');
        }catch (\Exception $e){

        }
    }
}
