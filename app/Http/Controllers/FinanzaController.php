<?php

namespace App\Http\Controllers;

use App\Models\Viaticos;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FinanzaController extends Controller
{
    //

    public function index()
    {
      $solicitud = Viaticos::all();
       $unidad = DB::table('solicitud')->where('estatus')->get();
      return view('finanza.modulo_viatico.index', compact('unidad', 'solicitud'));
    }

    public function store(Request $request)
    {

      $request->validate([
        'viaticos' => 'required|file',
        'memorandum' => 'required|file',
        'estatus' => 'required',
    ]);
     

    $siglas = 'ABC'; 
    $identificador = $siglas . '-' . str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT) . '-' . now()->year;


     $vi = new Viaticos;
     $vi->viaticos = $request->file('viaticos')->storeAs('upload-documentos', $request->file('viaticos')->getClientOriginalName(), 'public');
     $vi->memorandum = $request->file('memorandum')->storeAs('upload-documentos', $request->file('memorandum')->getClientOriginalName(), 'public');
     $vi->estatus = $request->estatus;
     $vi->identificador = $identificador;
     $vi->save();
      
   }


 

  }