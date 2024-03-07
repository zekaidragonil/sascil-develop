<?php

namespace App\Http\Controllers;

use App\Models\RendicionTrabajador;
use App\Models\Trabajadores;
use App\Models\unidad_solicitante;
use Illuminate\Http\Request;

class Reportes extends Controller
{
    public function index()
    {
        $comprometidos = unidad_solicitante::where('estatus', 'comprometido')->count();
        $causados = unidad_solicitante::where('estatus', 'causado')->count();
        $pagados = unidad_solicitante::where('estatus', 'pagado')->count();
        $rechazados = unidad_solicitante::where('estatus', 'rechazado')->count();
        $trabajador = Trabajadores::count();
        $rendicion = RendicionTrabajador::count();

        return view('finanza.modulo_viatico.reporte', 
        compact('comprometidos', 'causados','pagados' , 'rechazados', 'trabajador', 'rendicion' ));
    }
}
