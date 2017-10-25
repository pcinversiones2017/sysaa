<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CronogramaController extends Controller
{
    public function crear()
    {
        $crearCronograma = 'active';
        return view('cronograma.crear')->with(compact('crearCronograma'));
    }

    public function guardar(Request $request)
    {
        $cronogramaGeneral = new Plan();
        $cronogramaGeneral->fechaInicial = $request->fechaInicial;
        $cronogramaGeneral->fechaFinal = $request->fechaFinal;
        $cronogramaGeneral->save();

        return redirect('cronograma/listar');
    }

}
