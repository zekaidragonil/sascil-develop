<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\model_estado;
use App\Models\model_empresa;
use App\Models\model_tipo_empresa;

class empresaController extends Controller
{
    public function view_registro_empresa()
    {
        if(session('id')){
            $estado = model_estado::estado();
            $empresa = model_empresa::empresa();
            $tipo_empresa = model_tipo_empresa::tipo();
            //dd($empresa);
            return view('usuario.view_registro_empresa',compact('estado','empresa','tipo_empresa'));
        }else
            return view('notf.notf34');
    }
    public function registro_empresa(Request $request)
    {
        if(session('id')){
            //dd($request->all());
            $registro_empresa = model_empresa::registro($request);
            if($registro_empresa){
                return view('notf.notf67');
            }
            else{
                return view('notf.notf68');
            }
        }else
            return view('notf.notf34');
    }

    public function store(Request $request)
    {
        //
    }
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
