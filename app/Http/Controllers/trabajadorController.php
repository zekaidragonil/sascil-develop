<?php

namespace App\Http\Controllers;

use App\Models\Trabajadores;
use Illuminate\Http\Request;
use App\Models\Asignacion_De_Viatico;
use App\Models\RendicionTrabajador;
use Illuminate\Validation\Rule;

class trabajadorController extends Controller
{

   public function show($id)
{    
    $rendicion = RendicionTrabajador::with('trabajador')->get();

     $trabajador = Trabajadores::find($id);
    $viaticos = Asignacion_De_Viatico::find($id);
    if($viaticos->estatus = 'Conpernota'){
        
        $alojamiento = $viaticos->trasladoConpernota;
        $transporte = $viaticos->alojamientoConpernota;
        $alimentacion = $viaticos->alimentacionConpernota;
        $suma = $alojamiento + $transporte + $alimentacion;
    } elseif ($viaticos->estatus === 'Sinpernota') {
        $alojamiento = $viaticos->trasladoSinpernota;
        $alimentacion = $viaticos->alimentacionSinpernota;
        $suma = $alojamiento + $alimentacion;
    }


    return view('finanza.trabajador.show', compact('suma', 'trabajador' , 'rendicion')); 
    
}

    
  public function store (Request $request)

  {  

    $request->validate([
        'nombre' => 'required|string',
        'apellido' => 'required|string',
        'ci' => 'required',
        'cuenta_bancaria' => 'required',
        'referencia_bancaria' => 'required|file',
        'carnet' => 'required|file',
        'cedula_copias' => 'required|file',
    ]);
     
     $repetida = Trabajadores::pluck('ci');

     if ($repetida->contains($request->ci)) {
        return redirect()->route('finanza')->with('error', 'La cédula ya está registrada.');
    }

     $trabajador = new Trabajadores;
     $trabajador->nombre = $request->nombre;
     $trabajador->apellido = $request->apellido;
     $trabajador->ci = $request->ci;
     $trabajador->cuenta_bancaria = $request->cuenta_bancaria;
     $trabajador->referencia_bancaria = $request->file('referencia_bancaria')->storeAs('trabajador-documentos', $request->file('referencia_bancaria')->getClientOriginalName(), 'public');
     $trabajador->carnet = $request->file('carnet')->storeAs('trabajador-documentos', $request->file('carnet')->getClientOriginalName(), 'public');
     $trabajador->cedula_copias = $request->file('cedula_copias')->storeAs('trabajador-documentos', $request->file('cedula_copias')->getClientOriginalName(), 'public');
    
 
     $trabajador->save();
     return redirect()->route('finanza')->with('success', 'Trabajador guardado con exito.');
    
}

public function buscar($cedula)
{
    $trabajador = Trabajadores::where('ci', $cedula)->get(); 
     
    if (!$trabajador) {
        return response()->json(['error' => 'No se encontró ningún trabajador con esa cédula.'], 404);
    }
    return response()->json($trabajador);
}

 public function viatico(Request $request)

 {
    $request->validate([
        'trabajador_id' => 'required|integer',
        'estatus' => 'required|in:Conpernota,Sinpernota',
        'trasladoConpernota' => 'nullable|numeric',
        'alojamientoConpernota' => 'nullable|numeric',
        'alimentacionConpernota' => 'nullable|numeric',
        'Cdesde' => 'required_if:estatus,Conpernota|nullable|date',
        'Chasta' => 'required_if:estatus,Conpernota|nullable|date',
        'trasladoSinpernota' => 'nullable|numeric',
        'alimentacionSinpernota' => 'nullable|numeric',
        'Sdesde' => 'required_if:estatus,Sinpernota|nullable|date',
        'Shasta' => 'required_if:estatus,Sinpernota|nullable|date',
    ]);


    $aprobado = new Asignacion_De_Viatico;
     $aprobado->identificador = $request->identificadorSeleccionado;
     $aprobado->trabajador_id = $request->trabajador_id;
     $aprobado->estatus = $request->estatus;
     $aprobado->trasladoConpernota = $request->trasladoConpernota;
     $aprobado->alimentacionConpernota = $request->alimentacionConpernota;
     $aprobado->Cdesde = $request->Cdesde;
     $aprobado->Chasta = $request->Chasta;
     $aprobado->trasladoSinpernota = $request->trasladoSinpernota;
     $aprobado->alimentacionSinpernota = $request->alimentacionSinpernota;
     $aprobado->Sdesde = $request->Sdesde;
     $aprobado->Shasta = $request->Shasta;
    $aprobado->save();
    return redirect()->route('finanza')->with('viatico', 'vitaticos aprobados con exito.');
 }
  
 public function rendicion(Request $request, $id)
 {
  
    $request->validate([
        'trabajador_id' => 'required',
        'monto_asignado' => 'required', 
        'monto_factura' => 'required',
        'cuenta_bancaria' => 'required',
        'Cantidad_faltante' => 'nullable',
        'observacion' => 'nullable',
        'facturas' => 'required|file',
    ]);

    $rendicion = new RendicionTrabajador;
   $rendicion->trabajador_id = $request->trabajador_id;
   $rendicion->monto_asignado = $request->monto_asignado;
   $rendicion->monto_factura = $request->monto_factura;
   $rendicion->Cantidad_faltante = $request->Cantidad_faltante;
   $rendicion->cuenta_bancaria = $request->cuenta_bancaria;
   $rendicion->observacion = $request->observacion;
   $rendicion->facturas = $request->file('facturas')->storeAs('facturas-documentos', $request->file('facturas')->getClientOriginalName(), 'public');

   $rendicion->save();
   return redirect()->route('finanza')->with('factura', 'vitaticos aprobados con exito.');
 } 

}