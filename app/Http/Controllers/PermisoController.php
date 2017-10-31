<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PermisoController extends Controller
{
    public function autorizar($id)
    {
    	AsignarUsuarioTablas($id);
    	return view('usuario.asignar')->with();
    }
}
