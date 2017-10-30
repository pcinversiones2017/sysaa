<?php

namespace App\Http\Controllers;

use App\Models\Procedimientosp;
use Illuminate\Http\Request;

class ProcedimientospController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listar()
    {
        $prodecimientossp = Procedimientosp::all();
        return view('procedimientosp.listar')->with(compact('prodecimientossp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $crearProcedimientosp = 'active';
        return view('procedimientosp.crear')->with(compact('crearProcedimientosp'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        $procedimientoSP = new Procedimientosp();
        $procedimientoSP->nombre = $request->nombre;
        $procedimientoSP->codSubPro = $request->codSubPro;
        $procedimientoSP->save();
        return redirect('subproceso/mostrar/' . $request->codSubPro);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Procedimientosp $procedimientosp
     * @return \Illuminate\Http\Response
     */
    public function mostrar($codProSP)
    {
        $procedimientosp = Procedimientosp::find($codProSP);
        return view('procedimientosp.mostrar')->with(compact('procedimientosp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Procedimientosp $procedimientosp
     * @return \Illuminate\Http\Response
     */

    public function editar(Request $request)
    {
        $procedimientoSP = Procedimientosp::find($request->codProSP);
        return view('procedimientosp.editar')->with(compact('pro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Procedimientosp  $procedimientosp
     * @return \Illuminate\Http\Response
     */
    public function actualizar(Request $request, Procedimientosp $procedimientosp)
    {
        $procedimientoSP = Procedimientosp::find($request->codProSP);
        $procedimientoSP-> nombre = $request->nombre;
        $procedimientoSP-> codSubPro = $request-> codSubPro;
        $procedimientoSP->save();

        return redirect('procedimientosp/listar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Procedimientosp  $procedimientosp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Procedimientosp $procedimientosp)
    {
        //
    }
}
