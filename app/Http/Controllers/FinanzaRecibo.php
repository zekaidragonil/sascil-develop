<?php

namespace App\Http\Controllers;

use App\Models\Asignacion_De_Viatico;
use App\Models\unidad_solicitante;
use Illuminate\Http\Request;

class FinanzaRecibo extends Controller
{
  public function index()
  {
   
$asignaciones = Asignacion_De_Viatico::with('trabajador')->get();
    $solicitud = unidad_solicitante::where('estatus', 'causado')->get();
    return view('finanza.modulo_viatico.finanza', compact('solicitud', 'asignaciones'));
    
  }

  
}
