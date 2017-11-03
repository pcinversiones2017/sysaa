<?php

use App\Models\Historial;

function RegistrarActividad($tabla, $accion, $mensaje)
{
	Historial::create(['codUsu' => Auth::user()->codUsu, 'tabla' => $tabla, 'accion' => $accion, 'mensaje' => 'El usuario '.Auth::user()->nombres.' '.$mensaje]);
}