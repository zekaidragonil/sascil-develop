<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\model_estatus;

class registroController extends Controller
{
    public function view_registro()
    {
        if(session('id'))
        {
            $estatus = model_estatus::estatus();
            return view('view_registro',compact('estatus',$estatus));
        }else
            return view('notf.notf34');
    }
}
