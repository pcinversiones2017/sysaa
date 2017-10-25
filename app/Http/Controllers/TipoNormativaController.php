<?php

namespace App\Http\Controllers;

use App\Models\TipoNormativa;
use Illuminate\Http\Request;

class TipoNormativaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listar()
    {
        $tipo_normativas = TipoNormativa::all();
        $listarTipoNormativa = 'active';
        return view('tipo_normativa.listar')->with(compact('tipo_normativas', 'listarTipoNormativa' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $crearTipoNormativa = 'active';
        return view('tipo_normativa.crear')->with(compact('crearTipoNormativa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        $tipoNormativa = new TipoNormativa();
        $tipoNormativa->nombreTipNorm = $request->nombreTipNorm;
        $tipoNormativa->save();

        return redirect('tipo_normativa/listar');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoNormativa  $tipoNormativa
     * @return \Illuminate\Http\Response
     */
    public function show(TipoNormativa $tipoNormativa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoNormativa  $tipoNormativa
     * @return \Illuminate\Http\Response
     */
    public function editar(Request $request)
    {
        $tipoNormativa = TipoNormativa::find($request->codTipNorm);
        return view('tipo_normativa.editar')->with(compact('tipoNormativa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoNormativa  $tipoNormativa
     * @return \Illuminate\Http\Response
     */
    public function actualizar(Request $request)
    {
        $tipoNormativa = TipoNormativa::find($request->codTipNorm);
        $tipoNormativa->nombreTipNorm = $request->nombreTipNorm;
        $tipoNormativa->save();

        return redirect('tipo_normativa/listar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoNormativa  $tipoNormativa
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoNormativa $tipoNormativa)
    {
        //
    }
}
