<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\model_auditoria;
class auditoriaController extends Controller
{
    public function consultar_auditoria(){
        if(session('id')){
        $consultar=model_auditoria::consultar();
        //dd($consultar);
        return view('admin_usuarios.view_consultar_auditoria',compact('consultar'));
    }else
    return view('notf.notf34');
    }
}
