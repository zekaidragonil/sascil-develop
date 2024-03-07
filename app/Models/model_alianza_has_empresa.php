<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class model_alianza_has_empresa extends Model
{
    use HasFactory;
    protected $table = 'alianza_has_empresa';

    public function alianza(){
        $this->belongsTo('App\model_alianza');
    }
    public function empresa(){
        $this->belongsTo('App\model_empresa_sujerida');
    }
    public static function solicitud($valor){
    }

    public static function agregar($alianza,$empresas){
        $ente = DB::table('ente')->select('nombre')->where('id','=','1')->get();
        $correlativo=substr(str_repeat(0, 4).$alianza, - 5);
        //dd($correlativo);
        $actualizar = model_alianza::find($alianza);
        $actualizar->numero_alianza = 'ALIANZA-'.$ente[0]->nombre.'-'.date('Y').'-'.$correlativo;
        $actualizar->save();
        $cont=count($empresas);
        for ($i=0; $i < $cont; $i++) { 
            $agregar = new model_alianza_has_empresa();
            $agregar->id_alianza = $alianza;
            $agregar->id_empresa = $empresas[$i];
            $agregar->save();
        }
        return true;
    }
    public static function empresas($data){
        //dd($data);
        $empresas = DB::table('alianza_has_empresa as a_e')->select('e.id','e.nombre')->join('alianza as a','a.id','=','a_e.id_alianza')->join('empresa as e','e.id','=','a_e.id_empresa')->where('a_e.id_alianza','=',$data)->get();
        return $empresas;
        //dd($empresas);
    }
}
