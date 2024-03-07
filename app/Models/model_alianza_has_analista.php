<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\model_alianza;
use DB;
class model_alianza_has_analista extends Model
{
    use HasFactory;
    protected $table = "alianza_has_analista";
    
    public function alianza(){
        return $this->belongsTo('App\model_alianza');
    }
    public function usuario(){
        return $this->belongsTo('App\model_usuario');
    }
    public static function asignar($id){
        //dd($id->all());
        $asignar = new model_alianza_has_analista();
        $asignar->id_usuario = $id->analista;
        $asignar->id_alianza = $id->id_alianza;
        $asignar->fecha_asignado = date('Y-m-d h:m:s');
        $asignar->save();
        $alianza= model_alianza::find($id->id_alianza);
        $alianza->estatus = 'Asignada';
        $alianza->save();
        return true;
        //dd($asignar);
    }
    public static function consulta(){
        $consultar = DB::table('alianza as a')->select('a.numero_alianza','a.estatus','a.created_at as fecha_solicitud','fecha_respuesta','u.nombre','u.apellido','u.id','a.id')->join('alianza_has_analista as a_a','a.id','=','a_a.id_alianza')->join('usuario as u','u.id','=','a_a.id_usuario')->get();
        //dd($consultar);
        //pintar el resultado en un tabla
        return $consultar;
    }


    public static function analisis_alianza(){
        $analisis_alianza=DB::table('alianza_has_analista as a_a')->select('a.id','a.numero_alianza','a_a.fecha_asignado','a_a.fecha_respuesta','a.estatus')->join('alianza as a','a.id','=','a_a.id_alianza')->join('usuario as u','u.id','=','a_a.id_usuario')->where('a_a.id_usuario','=',session('id'))->get();
        //dd($analisis_alianza);
        return $analisis_alianza;
    }
    public static function asignadas(){
        dd(session('id'));
        $consulta = DB::table('alianza_has_analista as a_a')->select('u.nombre','u.apellido','a.id','a.numero_alianza','a_a.fecha_asignado','a_a.fecha_respuesta','a.estatus')->join('alianza as a','a.id','=','a_a.id_alianza')->join('usuario as u','u.id','=','a_a.id_usuario')->leftjoin('alianza_has_gerente as a_g','a_g.id_alianza','=','a.id')->get();
        //dd(session('id'),$consulta);
        return $consulta;
    }
    public static function asignar_alianza_analista($data){
        //dd($data->all());
        $asignar = new model_alianza_has_analista();
        $asignar->id_usuario = $data->analista;
        $asignar->id_alianza = $data->id_alianza;
        $asignar->fecha_asignado = date('Y-m-d h:m:s');
        $asignar->save();

        $alianza = model_alianza::find($data->id_alianza);
        $alianza->estatus = 'Asignada';
        $alianza->save();
        return true;
    }
    public static function analizar_alianza(){
        $aux= DB::table('alianza as a')->select('a.id','numero_alianza','un.nombre','a.created_at as fecha_creacion','estatus')->join('unidad as un','un.id','=','a.id_unidad')->join('alianza_has_analista as a_a','a_a.id_alianza','=', 'a.id')->get();
        return $aux;
    } 
}