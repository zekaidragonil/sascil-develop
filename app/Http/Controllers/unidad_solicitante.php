<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\unidad_solicitante as unidad;

class unidad_solicitante extends Controller
{
   
    public function index()
    {
      $solicitud = unidad::all();
      return view('finanza.modulo_viatico.Unidad_solicitante', compact('solicitud'));
    }

    public function store(Request $request)
    {

      $request->validate([
        'viaticos' => 'required|file',
        'memorandum' => 'required|file',
        'estatus' => 'required|string',
    ]);
     

    $siglas = 'ABC'; 
    $correlativo = str_pad(rand(1, 99999), 5, '0', STR_PAD_LEFT);
    $identificador = $siglas . '-' . $correlativo . '-' . now()->year;

     $vi = new unidad;
     $vi->viaticos = $request->file('viaticos')->storeAs('upload-documentos', $request->file('viaticos')->getClientOriginalName(), 'public');
     $vi->memorandum = $request->file('memorandum')->storeAs('upload-documentos', $request->file('memorandum')->getClientOriginalName(), 'public');
     $vi->estatus = $request->estatus;
     $vi->identificador = $identificador;
     $vi->save();
     return redirect()->route('unidad')->with('success', 'La solicitud se ha enviado existosamente.');
      
   }


   public function actualizar($id)
   {

    $actualizacion = unidad::find($id);
    return view('finanza.modulo_viatico.solictud_viaticos', compact('actualizacion'));
    
   }

   public function update(Request $request , $id)
 
   {
       $vi = unidad::find($id);
        $vi->estatus = $request->estatus;
      if ($request->hasFile('viaticos')) {
         // Eliminar el archivo anterior si existe
        if ($vi->viaticos) {
            Storage::disk('public')->delete($vi->viaticos);
        }
        $vi->viaticos = $request->file('viaticos')->storeAs('upload-documentos', $request->file('viaticos')->getClientOriginalName(), 'public');
    }
    
    if ($request->hasFile('memorandum')) {
        if ($vi->memorandum) {
            Storage::disk('public')->delete($vi->memorandum);
        }
        $vi->memorandum = $request->file('memorandum')->storeAs('upload-documentos', $request->file('memorandum')->getClientOriginalName(), 'public');
    }
      
       $vi->save();
       return redirect()->route('unidad')->with('success', 'La solicitud se actualizado  correctamente y cambio su estatus.');


   }
  }
