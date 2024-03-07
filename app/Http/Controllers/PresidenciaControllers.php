<?php

namespace App\Http\Controllers;

use App\Models\unidad_solicitante;
use Illuminate\Http\Request;

class PresidenciaControllers extends Controller
{
    public function index()

    {
    $solicitud = unidad_solicitante::where('estatus', 'comprometido')->get();
    return view('finanza.modulo_viatico.Presidencia', compact('solicitud'));
    
    }
}
