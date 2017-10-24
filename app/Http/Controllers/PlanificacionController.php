<?php
/**
 * Created by PhpStorm.
 * User: Programador1
 * Date: 24/10/2017
 * Time: 12:20
 */

namespace App\Http\Controllers;


class PlanificacionController extends Controller
{
    public function index()
    {
        return view('planificacion.index');
    }
}