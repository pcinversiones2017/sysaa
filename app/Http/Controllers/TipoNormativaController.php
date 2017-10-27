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
        $tipoNormativas = TipoNormativa::all();
        $listarTipoNormativa = 'active';
        return view('tipo_normativa.listar')->with(compact('tipoNormativas', 'listarTipoNormativa' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $tipoNormativas = 'active';
        return view('tipo_normativa.crear')->with(compact('tipoNormativas'));
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
        $tipoNormativa->nombre = $request->nombre;
        $tipoNormativa->estado = 'activo';
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
        $tipoNormativa->nombre = $request->nombre;
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
