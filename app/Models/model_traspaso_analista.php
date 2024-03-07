<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\traspaso;
use DB;
class model_traspaso_analista extends Model
{
    use HasFactory;
    protected $table = 'traspaso_analista';

    public function traspaso(){
        return $this->belongsTo('App\model_traspaso');
    }
    public function usaurio(){
        return $this->belongsTo('App\model_usurio');
    }

    public static function traspaso_analista()
    {
        return $this->BelongsTo('App\traspaso_analista');
    }
    
    public static function asignar_traspaso_analista($data){
        //dd($data);
        $asignar = new model_traspaso_analista();
        $asignar->id_usuario = $data['analista'];
        $asignar->id_traspaso = $data['id'];
        $asignar->fecha_asignada = date('Y-m-d h:m:s');
        $asignar->save();

        $traspaso = model_traspaso::find($data['id']);
        $traspaso->estatus = 'Asignado';
        $traspaso->save();
        //dd($traspaso);
        return true;
    }

    public static function lista(){
        $lista = DB::table('traspaso_analista as t_a')->select('t.id','u.id','un.nombre as nombre_unidad','u.nombre','u.apellido','t_a.fecha_asignada','t_a.fecha_respuesta','t.estatus','memorandum_traspaso','solicitud_credito_presupuestario')->join('traspaso as t','t.id','=','t_a.id_traspaso')->join('usuario as u','u.id','=','t_a.id_usuario')->join('unidad as un','un.id','=','t.id_unidad')->get();
        //dd('llegue',$lista);
        return $lista;
    }
} 
