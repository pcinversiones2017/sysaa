<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;


class InicioController extends Controller
{
    public function __construct()
    {
        
    }

    public function index()
    {
    	return view('inicio.inicio');
    }
}
