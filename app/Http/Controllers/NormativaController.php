<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Normativa;

class NormativaController extends Controller
{
    public function editar($codNorm)
    {
    	$normativas = Normativa::where('codNorm',$codNorm)->get();
    	return view('normativa.editar', compact(['normativas']));
    }

    public function actualizar(Request $request)
    {
    	$data = Normativa::find($request->codNorm);
    	$data->tipoNormativa = $request->tipoNormativa;
    	$data->nombre		= $request->nombre;
    	$data->numero 		= $request->numero;
    	$data->fecha 		= $request->fecha;
    	$data->save();

    	return back()->with('success', 'Se actualizo la normativa');
    }
}

