<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class model_empresa_has_solicitud extends Model
{
    use HasFactory;
    protected $table = 'empresa_has_solicitud';
    
    public function empresa(){
        return $this->belongsTo('App\Models\model_empresa');
    }
    public function solicitud(){
        return $this->belongsTo('App\Models\model_solicitud');
    }
    public static function empresas_seleccionadas($data){//asociar empresas seleccionadas con las slicitudes de contratación presupuestaría
        for ($i=0; $i <count($data->id_empresa) ; $i++) { 
            $asociar= new model_empresa_has_solicitud();
            $asociar->id_solicitud = $data->id_solicitud;
            $asociar->id_empresa = $data->id_empresa[$i];
            $asociar->save();
        }
        return true;
    }
    public static function lista_empresas($id_solicitud){
        $consulta = DB::table('empresa_has_solicitud as e_s')->select('id','nombre')->join('empresa as emp','emp.id','=','e_s.id_empresa')->where('e_s.id_solicitud','=',$id_solicitud)->get();
        return $consulta;
    }
    public static function objeto_empresa($id){
        $obj = DB::table('empresa')->select('objeto_empresa')->where('id','=',$id)->get();
        return $obj[0]->objeto_empresa;
    }
}
