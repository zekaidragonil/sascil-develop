<?php

namespace App\Http\Controllers;

use App\Models\Viaticos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FinanzaUpdateControllers extends Controller
{
 public function index($id){


    $actualizacion = Viaticos::find($id);
    return view('finanza.modulo_viatico.update', compact('actualizacion'));
    
 }


 public function update(Request $request , $id)
 
 {

      
    $vi = Viaticos::find($id);

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

 }

}
