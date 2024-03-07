<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class model_solicitud_gerente extends Model
{
    use HasFactory;
    protected $table = 'solicitud_has_gerente';

    public function solicitud(){
        $this->belongsTo('App\model_solicitud');
    }

    public function usuario(){
        $this->belongsTo('App\model_usuario');
    }
    public static function asignar_gerente($analista){
        //dd($analista->all());
        $asignar = new model_solicitud_gerente();
        $asignar->id_solicitud = $analista->id_solicitud;
        $asignar->id_usuario = $analista->gerente_regional;
        $asignar->fecha_asignado = date('Y-m-d h:m:s');
        $asignar->save();

        $solicitud = model_solicitud::find($analista->id_solicitud);
        $solicitud->estatus = 'Asignado';
        $solicitud->save();
        return true;
    }
}
