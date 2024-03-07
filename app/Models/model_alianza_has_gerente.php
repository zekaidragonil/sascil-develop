<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class model_alianza_has_gerente extends Model
{
    use HasFactory;
    protected $table = 'alianza_has_gerente';


    public static function consulta_alianza_gerente(){
        $aux= DB::table('alianza as a')->select('a.id','a.solicitud_alianza','a.numero_alianza','a.estatus','un.nombre','a.created_at as fecha_solicitud')->join('unidad as un','un.id','=','a.id_unidad')->leftjoin('alianza_has_gerente as a_a','a_a.id_alianza','=','a.id')->whereNull('a_a.id_alianza')->where('a.estatus','=','Asignado')->whereNotNull('a.numero_alianza')->where('a_a.id_usaurio','=',session('id'))->get();
        //dd('llegue',$aux);
        return $aux;
    }


    public static function asignar_alianza_gerente($data){
        //dd($data->all());
        $asignar = new model_alianza_has_gerente();
        $asignar->id_usuario = $data->analista;
        $asignar->id_alianza = $data->id_alianza;
        $asignar->fecha_asignado = date('Y-m-d h:m:s');
        $asignar->save();
        return true;
    }

    public static function asignadas(){
        $consulta = DB::table('alianza_has_gerente as a_g')->select('u.nombre','u.apellido','a.id','a.numero_alianza','a_g.fecha_asignado','a_g.fecha_respuesta','a.estatus')->join('alianza as a','a.id','=','a_g.id_alianza')->join('usuario as u','u.id','=','a_g.id_usuario')->get();
        //dd(session('id'));
        //dd($consulta);
        return $consulta;
    }
}
