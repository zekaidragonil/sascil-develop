<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use APP\Http\Controller\Session;
use App\Models\Flight;
use DB;
use APP\Models\model_unidad;
use phpDocumentor\Reflection\Types\Boolean;
use Illuminate\Support\Facades\Crypt;

class model_usuario extends Model
{
    use HasFactory;
    protected $table='usuario';
    protected $primaryKey='id';

    public function unidad()
    {
        return $this->BelongsTo('App\model_unidad');
    }
    public function perfil()
    {
        return $this->BelongsTo('App\model_perfil');
    }
    public function certificacion_presupuestaria_analista(){
        return $this->hasMany('App\model_certificacion_presupuestaria_analista');
    }

    public function solicitud_has_usuario(){
        return $this->hasMany('App\model_solicitud_has_usuario');
    }

    public function solicitud_has_gerente(){
        return $this->hasMany('App\model_solicitud_has_gerente');
    }

    public function traspaso_analista(){
        return $this->hasMany('App\model_traspaso_analista');
    }

    //verificación de usuario en base de datos
    public static function login($datos)
    {
        $aux='';
        for ($i=0; $i < 5; $i++) {
            if($aux=='')
                $aux=base64_encode($datos->clave);
            else
                $aux=base64_encode($aux);
        }
        $resp = DB::table('usuario')->select('usuario.id as id_user','correo','usuario.nombre as nombre_user','apellido','clave','id_perfil','estatus','id_ente','unidad.id','activo')->join('unidad','unidad.id','=','usuario.id_unidad')->where('correo','=',$datos->correo)->where('clave','=',$aux)->where('estatus','=','1')->get();
        if(count($resp)===0)
            {
                return false;
            }
        else
        {
            session(['id'=>$resp[0]->id_user]);
            session(['correo'=>$resp[0]->correo]);
            session(['nombre'=>$resp[0]->nombre_user]);
            session(['apellido'=>$resp[0]->apellido]);
            session(['id_perfil'=>$resp[0]->id_perfil]);
            session(['id_unidad'=>$resp[0]->id]);
            session(['id_ente'=>$resp[0]->id_ente]);
            return $resp;
        }
    }
    public static function analistas($perfil,$id_unidad){
        //dd($perfil,$id_unidad);
        // $consulta = DB::table('usuario as u')->select('u.id','u.nombre','u.apellido')->join('perfil as p','p.id','=','u.id_perfil')->join('cargo as c','c.id','=','u.id_cargo')->join('unidad as un','un.id','=','u.id_unidad')->where('p.nombre_perfil','=','USUARIO')->where('c.cargo','=',$perfil)->where('un.id','=',$id_unidad)->where('estatus','=','1')->get();
        $consulta = DB::table('usuario as u')->select('u.id','u.nombre','u.apellido')->where('u.id_unidad','=',$id_unidad)->where('u.id_perfil','=',$perfil)->where('u.estatus','=',1)->get();
        //dd($consulta);
        return $consulta;
    }

    public static function analistas_juridico($perfil,$id_unidad){
        $consulta = DB::table('usuario as u')->select('u.id','u.nombre','u.apellido')->where('u.id_unidad','=',$id_unidad)->where('u.id_perfil','=',$perfil)->where('u.estatus','=',1)->get();
        //dd($consulta);
        return $consulta;
    }



    public static function analistas_procura($perfil,$id_unidad){
        //dd($perfil,$id_unidad);

        // $consulta = DB::table('usuario as u')->select('u.id','u.nombre','u.apellido')->join('perfil as p','p.id','=','u.id_perfil')->join('cargo as c','c.id','=','u.id_cargo')->join('unidad as un','un.id','=','u.id_unidad')->where('p.nombre_perfil','=','USUARIO')->where('c.cargo','=',$perfil)->where('un.id','=',$id_unidad)->where('estatus','=','1')->get();
        $consulta = DB::table('usuario as u')->select('u.id','u.nombre','u.apellido')->where('u.id_unidad','=',$id_unidad)->where('id_cargo','=',$perfil)->where('estatus','=','1')->where('id_perfil','=','3')->get();
        //dd($consulta);
        return $consulta;
    }

    public static function consultar($usuario) //funcion para validar que el usuario no exista
    {
        //dd($usuario);
        $consulta=DB::table('usuario')->select('correo')->where('correo','=',$usuario->correo)->get();
        //dd($usuario->correo);
        if(count($consulta))
            return true; // si es verdadero el usuario existe y no debe ser cargado
        else
            return false;// si es falso el usuario no existe y debe ser cargado

    }
    public static function lista_usuarios()// consulta todos los usuarios
    {
        $lista=DB::table('usuario')->select('usuario.id','correo','usuario.nombre','usuario.apellido','clave','nombre_perfil','estatus','unidad.nombre as unidad','ente.nombre as ente')->join('unidad','unidad.id','=','usuario.id_unidad')->join('ente','unidad.id_ente','=','ente.id')->join('perfil','perfil.id','=','usuario.id_perfil')->get();
        return $lista;
    }
    public static function usuario($id)
    {
        $usuario=DB::table('usuario')->select('usuario.id','correo','usuario.nombre as nombre_user','usuario.apellido','usuario.cedula','clave','id_perfil','id_cargo','estatus','id_unidad','id_ente','unidad.nombre')->join('unidad','unidad.id','=','usuario.id_unidad')->join('ente','unidad.id_ente','=','ente.id')->join('perfil','perfil.id','=','usuario.id_perfil')->where('usuario.id','=',$id)->get();
        //dd($usuario);
        $decript=$usuario[0]->clave;
        for ($i=0; $i < 5; $i++)
            $decript=base64_decode($decript);
        $usuario[0]->clave=$decript;
//        dd($usuario);
        return $usuario;
    }

    public static function guardar_usuario($datos)// esta funcion es para agregar datos de nuevos usuarios
    {
        //dd($datos->all(),Crypt::encrypt($datos->correo));
        $cript=''; //variable para encriptar la clave
        for ($i=0; $i < 5; $i++) {
            if($cript=='')
                $cript=base64_encode($datos->pass1);
            else
                $cript=base64_encode($cript);
        }
        //dd($datos->pass1,$cript);
        $usuario = new model_usuario();
        $usuario->correo=$datos->correo;
        $usuario->nombre=$datos->nombre;
        $usuario->apellido=$datos->apellido;
        $usuario->cedula=$datos->cedula;
        $usuario->id_perfil=$datos->id_perfil;
        $usuario->id_unidad=$datos->unidad;
        $usuario->clave=$cript;
        $usuario->estatus=1;//estatus 1 es activo, 0 es inactivo
        $usuario->id_cargo=$datos->cargo;
        $usuario->save();
        return true;
    }
     public static function actualizar_usuario($datos)
    {
        $usuario = new model_usuario();
        $usuario = model_usuario::find($datos->id);
        //dd($usuario);
        //dd($usuario->correo);
        $cript=''; //variable para encriptar la clave
        for ($i=0; $i < 5; $i++) {
            if($cript=='')
                $cript=base64_encode($datos->pass1);
            else
                $cript=base64_encode($cript);
        }
        //dd($datos->all(),$datos->pass1,$cript);
        //dd($usuario);
        if($usuario)
        {
            $usuario->nombre = $datos->nombre;
            $usuario->apellido = $datos->apellido;
            $usuario->clave = $cript;
            $usuario->correo = $datos->correo;
            $usuario->id_cargo = $datos->cargo;
            $usuario->id_unidad = $datos->unidad;
            $usuario->id_perfil = $datos->id_perfil;
            $usuario->estatus = $datos->estatus;
            $usuario->save();
            return true;
        }
        else
            return false;
    }
    public static function recuperar_clave($correo)
    {
        $aux=DB::table('usuario')->select('clave')->where('correo','=',$correo)->get();
        if(count($aux)===1)
        {
            $clave=$aux[0]->clave;
            for ($i=0; $i < 5; $i++) {
                $clave=base64_decode($clave);
            }
            //dd($clave);
        }else
            $clave='';
        return $clave;
    }
    public static function gerente($unidad){ //solo traela informacion del gerente de presupuesto
        $gerente = DB::table('usuario as us')->select('us.nombre','us.apellido','us.cedula'/*agregar la cedula de identidad*/)->join('unidad as un','un.id','=','us.id_unidad')->where('us.id_cargo','=','1')->where('un.nombre','=',$unidad)->get();
        //dd('llegue',$gerente);
        return $gerente;
    }
    public static function gerente_unidad()
    {
        //dd(session('id_unidad'));
        $gerente = DB::table ('usuario as us')->select('us.nombre','us.apellido')->join('unidad as un','un.id','=','us.id_unidad')->where('us.id_cargo','=','1')->where('us.id_unidad','=',session('id_unidad'))->get();
        //dd($gerente);
        return $gerente;

    }
    public static function gerente_regional(){
        $gerente_regional = DB::table('usuario as us')->select('us.id','nombre','apellido')->where('id_perfil','=','6')->where('id_unidad','=','22')->join('perfil as per','per.id','=','us.id_perfil')->get();
        //dd($gerente_regional);
        return $gerente_regional;
    }
    public static function analista_presupuesto(){
        $analistas = DB::table('usuario as us')->select('us.id','nombre','apellido')->where('id_perfil','=','4')->where('us.id_unidad','=','16')->get();
        return $analistas;
    }
    public static function analista_consultor(){
        $analista = DB::table('usuario as us')->select('us.id','nombre','apellido')->where('id','=',session('id'))->get();
        return $analista;
    }
}
