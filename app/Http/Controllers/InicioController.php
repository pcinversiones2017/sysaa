<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class InicioController extends Controller
{
    public function __construct()
    {
        dd(Auth::user());
    }

    public function index()
    {
    	return view('inicio.inicio');
    }
}
