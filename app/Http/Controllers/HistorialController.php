<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Historial;

class HistorialController extends Controller
{
    public function mostrar($id)
    {
    	$historial = Historial::join('users','users.codUsu','=','historial.codUsu')
    				->where('historial.codUsu',$id)
    				->orderBy('historial.fecha_creado', 'desc')
    				->get();
    	return view('historial.mostrar', compact('historial'));
    }
}
