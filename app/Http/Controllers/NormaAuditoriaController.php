<?php

namespace App\Http\Controllers;

use App\Models\Normativac;
use Illuminate\Http\Request;

class NormaAuditoriaController extends Controller
{
    public function listar()
    {
       $normasCAuditoria = Normativac::where('codTipNorm','=','2')->get();
        return view('normaAuditoria.listar')->with(compact('normasCAuditoria'));
    }
    public function listarAplica()
    {
        $normasCAuditoria = Normativac::where('codTipNorm','=','1')
           ->get();
        return view('normaAuditoria.listarAplica')->with(compact('normasCAuditoria'));
    }

    public function crear(){

        return view('normaAuditoria.crear');
    }
}
