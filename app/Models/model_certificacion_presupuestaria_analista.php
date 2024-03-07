<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class model_certificacion_presupuestaria_analista extends Model
{

    use HasFactory;
    protected $table = 'certificacion_presupuestaria_analista'; 
    function usuario(){
        return $this->belongsTo('App\model_usuario');
    }
    function certificacion_presupuestaria(){
        return $this->belongsTo('App\certificacion_presupuestaria');
    }
    public static function asignar($certificacion,$analista){
        //dd($certificacion,$analista);
        $asignar = new model_certificacion_presupuestaria_analista();
        $asignar->id_certificacion_presupuestaria = $certificacion;
        $asignar->id_usuario = $analista;
        $asignar->fecha_asignado = date('Y-m-d h:m:s');
        //dd($asignar);
        $asignar->save();
        //dd('asigne');
        return true;
    }
}
