<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\model_usuario;
use App\Models\model_estado;
use App\Models\model_municipio;
use App\Models\model_parroquia;
use App\Models\model_ente;
use App\Models\model_cargo;
use App\Models\model_unidad;
use App\Models\model_perfil;
use App\Models\model_auditoria;
use App\Http\Controllers\emailControler;


class loginController extends Controller
{
    public function view_login()
    {
        return view('view_login');
    }
    public function inicio()
    {
        $cargo = model_cargo::cargo();
        $ente = model_ente::ente();
        $perfil = model_perfil::perfil();
        return view('principal');
    }
    public function login(Request $datos)
    {
        $usuario=model_usuario::login($datos);
        //dd($usuario);
        if($usuario==false)
        {
            //intento fallido de incio de seccion
            model_auditoria::act('Inicio de session fallido, error en usuario y/o  contraseña','usuario','correo clave','','',now(),$datos->correo);
            return view('notf.notf1');// el usuario no existe
        }
        else
        {
            if ($usuario[0]->estatus == 1 )
            {
                if($usuario[0]->id != null)
                {
                    if($usuario[0]->id_perfil == 1)
                {
                    model_auditoria::act('Inicio de session cuenta de administrador por la ip: '.$_SERVER['REMOTE_ADDR'],'usuario','correo clave','','',now(),$datos->correo);
                    return view('principal');//administrador
                }
                if ($usuario[0]->id_perfil == 2) {
                    model_auditoria::act('Inicio de session cuenta de gerente por la ip: '.$_SERVER['REMOTE_ADDR'],'usuario','correo, clave','','',now(),$datos->correo);
                    return view('principal'); //usuario
                }
                if ($usuario[0]->id_perfil == 3) {
                    model_auditoria::act('Inicio de session cuenta de usuario por la ip: '.$_SERVER['REMOTE_ADDR'],'usuario','correo, clave','','',now(),$datos->correo);
                    return view('principal');//gerente
                }
                if ($usuario[0]->id_perfil == 4){
                    model_auditoria::act('Inicio de session cuenta de analista por la ip: '.$_SERVER['REMOTE_ADDR'],'usuario','correo, clave','','',now(),$datos->correo);
                    return view('principal');//analista
                }
                if ($usuario[0]->id_perfil == 5) {
                    model_auditoria::act('Inicio de session cuenta de recepcion por la ip: '.$_SERVER['REMOTE_ADDR'],'analista de recepcion','correo, clave','','',now(),$datos->correo);
                    return view('principal');//recepcion
                }
                if ($usuario[0]->id_perfil == 6) {
                    model_auditoria::act('Inicio de session cuenta de supervisor por la ip: '.$_SERVER['REMOTE_ADDR'],'suprevisor','correo, clave','','',now(),$datos->correo);
                    return view('principal');//recepcion
                }
                if ($usuario[0]->id_perfil == 7) {
                    model_auditoria::act('Inicio de session cuenta de consultor por la ip: '.$_SERVER['REMOTE_ADDR'],'consultor','correo clave','','',now(),$datos->correo);
                    return view('principal');//recepcion
                }
                }else{
                    return view('notf15');
                }

            }else
            {
                model_auditoria::act('inicio de session fallido, cuenta deshabilitada o unidad administrativa no existe','usuario','correo clave','','',now(),$datos->correo);
                return view('notf.notf2');
            }
        }
    }
    public static function logout()
    {
        if(session('id'))
        {
            model_auditoria::act('Cierre de sesión','usuario','correo clave','','',now(),session('correo'));
            session()->forget('id');
            session()->forget('correo');
            session()->forget('nombre');
            session()->forget('apellido');
            session()->forget('id_perfil');
            session()->forget('id_unidad');
            session()->forget('id_ente');
            ini_set("session.use_trans_sid","0");
            ini_set("session.use_only_cookies","1"); 
            return redirect('/');
        }else
            return view('notf.notf34');
    }

    public function agregar_usuarios()
    {
        if(session('id'))
        {
            //dd('llegue');
            $cargo = model_cargo::cargo();
            $ente = model_ente::ente();
            $perfil = model_perfil::perfil();

            return view('admin_usuarios/agregar_usuario',compact('cargo','ente','perfil'));
        }else
        return view('notf.notf34');
    }
    public function nuevo_usuario(Request $datos) //ingresar nuevos usarios
    {
        if(session('id'))
            {
            $consulta=model_usuario::consultar($datos);//verificando si el usuario existe
            //dd($consulta);
            if($consulta==true)
            return view('notf.notf3');
            else{
                //dd($datos);
                $guardar=model_usuario::guardar_usuario($datos);
                model_auditoria::act('Agregar un nuevo usuario','usuario','estatus, nombre, apellido, correo, clave, id_cargo, id_perfil, id_unidad','','1'.' | '.$datos->nombre.' | '.$datos->apellido.' | '.$datos->correo.' | '.$datos->pass1.' | '.$datos->cargo.' | '.$datos->id_perfil.' | '.$datos->unidad ,now(),session('correo'));

                return view('notf.notf4');
            }
        }else
            return view('notf.notf34');
    }

    public function consultar_usuario()
    {
        if(session('id'))
        {
                $lista=model_usuario::lista_usuarios();//consulta para listar a los usuarios en el sistema
                //dd($lista);
                model_auditoria::act('Consulta de lista de usuarios','usuario','estatus, nombre, apellido, correo, clave, id_cargo, id_perfil, id_unidad','','',now(),session('correo'));
                return view('admin_usuarios.lista_usuarios', compact('lista'));
        }else
            return view('notf.notf34');
    }
    public static function select_unidad(Request $id)//esta es una funcion para seleccionar la unidad administrativa de acuerdo al ente
    {
        //$unidad=DB::select('SELECT id,nombre FROM unidad WHERE id_ente ='.$id.';');
        $unidad=model_unidad::unidad($id->id);
        return $unidad;
    }
    public static function view_editar_usuario(Request $id)
    {
        if(session('id'))
        {
            $usuario=model_usuario::usuario($id->id);
            //dd($usuario);
            $cargo = model_cargo::cargo();
            $ente = model_ente::ente();
            $perfil = model_perfil::perfil();
            model_auditoria::act('Consulta de un usuario','usuario, unidad, ente','id,correo, nombre, apellido, clave, id_perfil, id_cargo, estatus, id_unidad,nombre_ente',$usuario[0]->id.' | '.$usuario[0]->correo.' | '.$usuario[0]->nombre_user.' | '.$usuario[0]->apellido.' | '.$usuario[0]->clave.' | '.$usuario[0]->id_perfil.' | '.$usuario[0]->id_cargo.' | '.$usuario[0]->id_cargo.' | '.$usuario[0]->estatus.' | '.$usuario[0]->id_unidad.' | '.$usuario[0]->id_ente.' | '.$usuario[0]->nombre,$usuario[0]->id.' | '.$usuario[0]->correo.' | '.$usuario[0]->nombre_user.' | '.$usuario[0]->apellido.' | '.$usuario[0]->clave.' | '.$usuario[0]->id_perfil.' | '.$usuario[0]->id_cargo.' | '.$usuario[0]->id_cargo.' | '.$usuario[0]->estatus.' | '.$usuario[0]->id_unidad.' | '.$usuario[0]->id_ente.' | '.$usuario[0]->nombre,now(),session('correo'));
            return view('admin_usuarios/view_editar_usuario',compact('usuario','cargo','ente','perfil'));
        }else
            return view('notf.notf34');
    }

    public function editar_usuarios(Request $actualizar)
    {
        if(session('id'))
        {
            if($actualizar->estatus=='on')
                $actualizar->estatus=1;
            else
                $actualizar->estatus=0;
            //dd($actualizar);
            $user=model_usuario::usuario($actualizar->id);
            //dd('llegue',$user);
            model_auditoria::act('Actualización de usuario','usuario, unidad, ente','id,correo, nombre, apellido, clave, id_perfil, id_cargo, estatus, id_unidad,nombre_ente',$user[0]->id.' | '.$user[0]->correo.' | '.$user[0]->nombre_user.' | '.$user[0]->apellido.' | '.$user[0]->clave.' | '.$user[0]->id_perfil.' | '.$user[0]->id_ente,$actualizar->id.' | '.$actualizar->correo.' | '.$actualizar->nombre.' | '.$actualizar->apellido.' | '.$actualizar->pass1.' | '.$actualizar->id_perfil.' | '.$actualizar->id_ente,now(),session('correo'));
            $val=model_usuario::actualizar_usuario($actualizar);
            //dd($val);
            if($val)
            {
                //$lista=model_usuario::lista_usuarios();
                return view('notf.notf14');
                //return view('admin_usuarios/lista_usuarios', compact($lista,'lista'));
            }
    }else
    return view('notf.notf34');
    }
    public function view_ente()
    {
        if(session('id'))
        {
            $ente=model_ente::lista_ente();
            //dd($ente);
            model_auditoria::act('Consultar entes adscritos','ente','id,nombre,rif,estado,municipio,parroquia','','',now(),session('correo'));
            return view('admin_usuarios/lista_ente',compact('ente'));
        }else
            return view('notf.notf34');
    }
    public function view_unidad(Request $id_ente)
    {
        if(session('id'))
        {
            $unidad=model_unidad::unidad_ente($id_ente->id);
            //dd($unidad);
            model_auditoria::act('Consultar Unidad Adminsitrativa','unidad, ente','id, unidad, ente','','',now(),session('correo'));
            $id=$id_ente->id;
            //dd($id);
            return view('admin_usuarios/view_unidad',compact('unidad'))->with('id',$id);
        }else
            return view('notf.notf34');
    }
    public function editar_unidad(Request $id)
    {
        if(session('id'))
        {
            //dd($id->modificar);
            if($id->modificar==1)
            {
                //dd($id->id);
                $aux=model_unidad::unidad_ind($id->id);
                //model_auditoria::act();
                //dd($aux);
                return view('admin_usuarios/actualizar_unidad')->with('id',$aux);
            }
            if($id->eliminar==0)
            {
                $aux=model_unidad::eliminar($id->id);
                if($aux==true)
                {
                    return view('notf.notf5');
                }
                else
                {
                    return view('notf.notf6');;
                }
                //return "elimine";
            }
        }else
            return view('notf.notf34');
    }
    public function agregar_unidad(Request $id)
    {
        if(session('id'))
        {
            //dd($id->id_ente);
            $ente = model_ente::consulta_ente($id);
            return view('admin_usuarios.agregar_unidad',compact($ente,'ente'));
        }else
            return view('notf.notf34');
    }
    public function guardar_unidad(Request $id)
    {
        if(session('id'))
        {
            //dd($id);
            $guardar=model_unidad::ingresar($id);
            if($guardar)
                return view('notf.notf7');
            else
            {
                return view('notf.notf8');
            }

            //dd($id);
        }else
        return view('notf.notf34');
    }
    public function actualizar_unidad(Request $act)
    {
        if(session('id'))
        {
            $aux=model_unidad::actualizar_unidad($act);
            if($aux)
                return view('notf.notf9');
            else
                return view('notf.notf10');
            //dd($act);
        }else
            return view('notf.notf34');
    }
    public function agregar_ente()
    {
        if(session('id'))
        {
            $estado = model_estado::estado();
            return view('admin_usuarios.view_agregar_ente',compact('estado'));
        }else
            return view('notf.notf34');
    }
    public function select_estado(Request $id)
    {
        if(session('id'))
        {
            //dd($id->id);
            $municipio=model_municipio::municipio($id->id);
            return $municipio;
        }else
            return view('notf.notf34');
    }
    public function select_municipio(Request $id)
    {
        $parroquia=model_parroquia::parroquia($id->id);
        return $parroquia;
    }

    public function guardar_ente(Request $id)
    {
        if(session('id'))
        {
            //dd($id);
            model_auditoria::act('Agregar un nuevo ente','ente','nombre,rif,id-.parroquia','',$id->nombre.' | '.$id->rif.' | '.$id->estado.' | '.$id->municipio.' | '.$id->parroquia.'|',now(),session('correo'));
            $ente=model_ente::guardar_ente($id);
            if($ente)
                return view('notf.notf11');
            else
                return view('notf.notf12');
        }else
            return view('notf.notf34');
    }
    public function perfil()
    {
        if(session('id'))
        {
            //dd(session('id'));
            $usuario = model_usuario::usuario(session('id'));
            $cargo = model_cargo::cargo();
            $ente = model_ente::ente();
            $perfil = model_perfil::perfil();
            return view('admin_usuarios.view_perfil',compact('usuario','cargo','ente','perfil'));
        }else
            return view('notf.notf34');
    }

    public function editar_perfil(Request $datos)
    {
        if(session('id'))
        {
            if($datos->estatus=='on')
                $datos->estatus=1;
            else
                $datos->estatus=0;
            model_usuario::actualizar_usuario($datos);
            return view('notf.notf13');
        }else
            return view('notf.notf34');
    }
    public function recuperar_clave()
    {
        return view('view_requperar_clave');
    }
    public function recup_clave(Request $request)
    {
        //dd($request->all());
        $clave=model_usuario::recuperar_clave($request->correo);
        
        if($clave!='')
        {
            emailControler::recuperar_clave($request->correo,$clave);
            return view('notf.notf35');
        }else
            return view('notf.notf36');
    }
}
