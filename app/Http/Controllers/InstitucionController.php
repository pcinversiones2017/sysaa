<?php

namespace App\Http\Controllers;

use App\Models\Institucion;
use Illuminate\Http\Request;

class InstitucionController extends Controller
{
    public function listar()
    {
        $instituciones = Institucion::all();
        return view('institucion.listar')->with(compact('instituciones'));
    }

    public function editar(Request $request)
    {

        $instituciones = Institucion::find($request->codInstitucion);
        return view('institucion.editar')->with(compact('instituciones'));
    }
    public function actualizar(Request $request)
    {

        $instituciones = Institucion::find($request->codInstitucion);
        $instituciones->nombreInstitucion = $request->nombreInstitucion;
        $instituciones->save();
        return redirect()->route('institucion.listar');
    }
}
