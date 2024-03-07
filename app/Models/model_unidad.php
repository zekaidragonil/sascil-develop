<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\model_usuario;
use App\Models\model_ente;
use DB;

class model_unidad extends Model
{
    use HasFactory;
    protected $table='unidad';
    protected $primaryKey='id';

    public function instrumento_legal()
    {
        return $this->hasMany('App\model_instrumento_legal');
    }

    public function ente()
    {
        return $this->BelongsTo('App\model_ente');
    }

    public function usuario()
    {
        return $this->hasMany('App\model_usuario');
    }
    public function proyecto()
    {
        return $this->hasMany('App\model_proyecto');
    }
    public static function traspaso(){
        return $this->hasMany('App\model_traspaso');
    }

    public static function unidad_administrativa(){//unidades adminsitrativas 
        $unidades = DB::table('unidad')->select('id','nombre')->get();
        return $unidades;
    }
    public static function id_unidad($n_unidad)
    {
        //dd($n_unidad);
        $id_unidad=DB::table('unidad')->select('id')->where('nombre','=',$n_unidad)->get();
        //dd($id_unidad);
        return $id_unidad;
    }

    public static function unidad_ind($id) //consulta que devuelve una sola unidad
    {
        $unidad=DB::table('unidad')->select('id','nombre')->where('id','=',$id)->get();
        return $unidad;
    }
    public static function unidad($id)//respuesta al al select de ente
    {
        $unidad=DB::table('unidad')->select('id','nombre')->where('id_ente','=',$id)->get();
        return $unidad;
    }

    public static function unidad_ente($id_ente)
    {
        $unidad = DB::table('unidad')->select('unidad.id','unidad.nombre as unidad','ente.nombre as ente')->join('ente','ente.id','=','unidad.id_ente')->where('unidad.id_ente','=',$id_ente)->get();
        //dd($unidad);
        return $unidad;
    }

    public static function ingresar($id)
    {
        //dd($id->nombre);
        $aux=DB::table('unidad')->select('nombre')->where('nombre','=',$id->nombre)->get();

        if(count($aux)==0)
        {
            $unidad = new model_unidad;
            $unidad->nombre=$id->nombre;
            $unidad->id_ente=$id->id_ente;
            $unidad->where('id_ente','=',$id->id_ente);
            $unidad->save();
            return true;
        }
        else
            return false;
    }
    public static function actualizar($id)
    {
        $id_ente = model_ente::conslta_ente($id);
        return $id_ente;
    }
    public static function actualizar_unidad($id)
    {
        //dd($id->nombre);
        $unidad = new model_unidad();
        $unidad = model_unidad::where('id',$id->id)->first();
        //dd($unidad);
        if($unidad)
        {
            $unidad->nombre=$id->nombre;
            $unidad->save();
            return true;
        }else
            return false;

    }
    public static function eliminar($id)
    {
        $consultar = DB::table('usuario')->select('id_unidad')->where ('id_unidad','=',$id)->get();
        if($consultar==[])
        {
            //dd($id);
            $unidad = modelo_unidad::class;
            $unidad = model_unidad::where("id",$id)->delete();
            //dd($unidad);
            return true;
        }else
        {
            return false;
        }
    }
    public static function siglas($id){
        $siglas = DB::table('unidad')->select('siglas')->where('id','=',$id)->get();
        return $siglas;
    }
    public static function sigls_cert($id){
        $siglas = DB::table('unidad')->select('siglas_cert')->where('id','=',$id)->get();
        return $siglas;
    }
}
