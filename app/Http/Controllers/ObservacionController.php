<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Observacion;

class ObservacionController extends Controller
{
    public function listar()
    {
    	$observaciones = Observacion::all();
    	$listarObservaciones = 'active';
    	return view('observacion.listar_os', compact(['observaciones', 'listarObservaciones']));
    }
}
