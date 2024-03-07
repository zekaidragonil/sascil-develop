<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class model_ente extends Model
{
    use HasFactory;
    protected $table='ente';
    protected $primaryKey='id';
    public function unidad()
    {
        return $this->hasMany('App\model_unidad');
    }
    public function parroquia()
    {
        return $this->BelongsTo('App\model_parroquia');
    }
    public static function ente()
    {
        $ente=DB::table('ente')->select('id','nombre')->get();
        return $ente;
    }
    public static function lista_ente()
    {
        $ente=DB::table('ente')->select('ente.id','nombre','rif','parroquia','municipio','estado')->join('parroquia','parroquia.id','=','ente.id_parroquia')->join('municipio','municipio.id','=','parroquia.id_municipio')->join('estado','estado.id','=','municipio.id_estado')->get();
        //dd($ente);
        return $ente;
    }
    public static function consulta_ente($id)
    {
        $consulta=DB::table('ente')->select('id','nombre')->where('id','=',$id->id_ente)->get();
        return $consulta;
    }

    public static function guardar_ente($id)
    {
        $ente = new model_ente();
        $ente->nombre=$id->nombre;
        $ente->rif=$id->rif;
        $ente->id_parroquia=$id->parroquia;
        $ente->save();
        return true;
    }
}
