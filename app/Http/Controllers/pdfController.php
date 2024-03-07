<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pdfController extends Controller
{
    public function imprimir()
    {
        $pdf = \PDF::loadView('solicitud_pdf');
        return $pdf->download('ejemplo.pdf');
    }

    public function certificacion()
    {
        $pdf = \PDF::loadView('certificacion_pdf');
        return $pdf->download('certificacion.pdf');
    }
    
    public static function solicitud_traspaso($data){

        $pdf = \PDF::loadView('solicitud_traspaso_pdf',compact('data'));
        return $pdf->download('solicitud_traspaso_pdf');
    }
}
