<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
class emailControler extends Controller
{
    public static function recuperar_clave($correo,$clave)
    {
        $subject = 'Recuperar CLave';
        $for = $correo;
        $mail=Mail::send('email.recuperar_clave',compact('correo','clave'), function($msj) use($clave,$subject,$for){
            $msj->from("SASCIL@corpoelect.gob.ve","emisor");
            $msj->subject($subject);
            $msj->to($for);
        });
        return redirect()->back();
    }
    public function create()
    {
        //
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
