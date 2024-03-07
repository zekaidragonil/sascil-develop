<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class model_empresa extends Model
{
    use HasFactory;
    protected $table='empresa';
    protected $primaryKey='id';
    public function instrumento_legal_has_empresa()
    {
        return $this->hasMany('App\model_instrumento_legal_has_empresa');
    }
    public function estado()
    {
        return $this->BelognsTo('App\model_estado');
    }
    public function municipio()
    {
        return $this->BelognsTo('App\model_estado');
    }
    public function parroquia()
    {
        return $this->BelognsTo('App\model_parroquia');
    }
    public function tipo_empresa(){
        return $this->BelognsTo('App\model_tipo_empresa');
    }

    public static function empresa(){
        $consulta = DB::table('empresa as emp')->select('emp.id','nombre','rif','tipo')->leftJoin('tipo_empresa as t_p','t_p.id','=','emp.id_tipo_empresa')->get();
        //dd($consulta);
        return $consulta;
    }

    public static function registro($empresa){
        //dd($empresa->all());
        $consulta = DB::table('empresa')->select('id')->where('rif','=',$empresa->rif)->get();
        if(count($consulta)>0){
            return false;
        }
        $registro = new model_empresa();
        $registro->nombre = $empresa->nombre_empresa;
        $registro->direccion = $empresa->direccion;
        $registro->rif = $empresa->rif;
        $registro->telefono = $empresa->telefono;
        $registro->correo = $empresa->email;
        $registro->id_estado= $empresa->estado;
        $registro->id_municipio = $empresa->municipio;
        $registro->id_parroquia = $empresa->parroquia;
        $registro->id_tipo_empresa = $empresa->tipo_empresa;
        $registro->objeto_empresa = $empresa->objeto_empresa;
        $registro->save();
        return true;
    }
    public static function empresas(){
        $consulta = DB::table('empresa')->select('id','nombre')->get();
        //dd($consulta);
        return $consulta;
    }
}
