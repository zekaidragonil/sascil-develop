<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\model_presupuesto_temporal;
use App\Models\model_usuario;
use DB;

class model_modificacion_analista extends Model
{
    use HasFactory;
    protected $table = 'modificacion_analista';
    public static function modificacion_presupuestaria(){
        return $this->belongsTo('App\model_modificacion_presupuestaria');
    }
    public static function usuario(){
        return $this->belongsTo('App\model_usuario');
    }

    public static function asignar_modificacion($data){
        //dd($data->id_analista);
        $asignar = new model_modificacion_analista();
        $asignar->id_usuario = $data->id_analista;
        $asignar->id_presupuesto_temporal = $data->id_modificacion;
        $asignar->fecha_asignado = date('Y-m-d h:m:s');
        //dd($asignar);
        $asignar->save();
        //dd($data->all());
        $actualizar = model_modificacion_presupuestaria::find($data->id_modificacion);
        $actualizar->estatus = 'Asignado';  
        $actualizar->save();
        return true;
    }
    public static function lista(){
        $lista = DB::table('modificacion_presupuestaria as m_p')->select('pro.proyecto_presupuestario','pro.nombre_proyecto','f.fondo','monto_asignar_bs','un.nombre as nombre_unidad','us.nombre','us.apellido','m_p.estatus')->join('fondo as f','f.id','=','m_p.id_fondo')->join('unidad as un','un.id','=','m_p.id_unidad')->join('proyecto as pro','pro.id','=','m_p.id_proyecto')->leftjoin('modificacion_analista as m_a','m_a.id_presupuesto_temporal','=','m_p.id')->leftjoin('usuario as us','us.id','=','m_a.id_usuario')->get();
        //dd($lista);
        return $lista;
    }
}