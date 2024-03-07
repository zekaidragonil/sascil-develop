<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\model_alianza_has_empresa;
use DB;

class model_alianza extends Model
{
    use HasFactory;
    protected $table = 'alianza';
    protected $primaryKey='id';
    
    public function alianza_has_empresa(){
        return $this->hasMany('App\model_alianza_has_empresa');
    }
    public function alianza_has_gerente(){
        return $this->hasMany('App\model_alianza_has_gerente');
    }
    public function alianza_has_analista(){
        return $this->hasMany('App\model_alianza_has_analista');
    }

    public function estatus(){
        return $this->hasMany('App\model_estatus');
    }
    public static function solicitud($data,$val1,$val2,$val3,$val4){
        //dd($valores);
        $unidad = DB::table('alianza')->select('id')->where('id_unidad','=',session('id_unidad'))->get();
        $cont = count($unidad);
        //dd($cont);
        if ($cont==0) {
            $cont=1;
        }else{
            $cont++;
        }
        $unidad = DB::table('unidad')->select('nombre')->where('id','=',session('id_unidad'))->get();
        $nombre_unidad = $unidad[0]->nombre;
        $explode = explode(' ',$nombre_unidad);
        $siglas='';
        foreach($explode as $x){
            $siglas .= $x[0];
        }
        $id = substr(str_repeat(0, 4).$cont, - 4);
        $solicitud_alianza = $siglas.'-'.$id.'-'.date('Y');
        
        $new = new model_alianza();
        //$new->numero_alianza = date('d-m-Y').'_'.session('id_unidad').'_'.$cont;
        $new->correlativo_unidad = $cont;
        $new->solicitud_alianza=$solicitud_alianza;
        $new->numero_punto = $data->numero_punto;
        $new->fecha_punto = $data->fecha_punto;
        $new->numero_control =$data->numero_control;
        $new->descripcion_alianza = $data->descripcion;
        $new->punto_cuenta = $val1;
        $new->espesificaciones_tecnicas = $val2;
        $new->matriz_tecnica = $val3;
        $new->memorandum = $val4;
        $new->estatus = 'POR REVISION';
        $new->id_unidad = session('id_unidad');
        $new->save();
        return true;
    }
    public static function consultar_alianza(){
        $aux=DB::table('alianza as al')->select('al.id','al.correlativo_unidad','al.solicitud_alianza','al.created_at as fecha_solicitud','numero_punto','fecha_punto','numero_alianza','estatus','id_estatus')->get();
        //dd($aux);
        return $aux;
    }

    public static function consulta_alianza_transito(){
        $aux= DB::table('alianza as a')->select('a.id','a.solicitud_alianza','a.solicitud_alianza','a.estatus','numero_punto','fecha_punto','un.nombre','a.created_at as fecha_solicitud')->join('unidad as un','un.id','=','a.id_unidad')->leftjoin('alianza_has_analista as a_a','a_a.id_alianza','=','a.id')->whereNull('a_a.id_alianza')->where('a.estatus','=','POR REVISION')->get();
        //dd($aux);
        return $aux;
    }
    
    public static function consulta_alianza_procura(){
        $aux= DB::table('alianza as a')->select('a.id','a.solicitud_alianza','a.numero_alianza','a.estatus','un.nombre','a.created_at as fecha_solicitud')->join('unidad as un','un.id','=','a.id_unidad')->leftjoin('alianza_has_gerente as a_g','a_g.id_alianza','=','a.id')->where('a.estatus','=','Recibido')->whereNotNull('a.numero_alianza')->whereNull('a_g.id_alianza')->get();
        //->whereNull('a_a.id_alianza')->where('a.estatus','=','Asignado')->whereNotNull('a.numero_alianza')->get();
        //dd('llegue',$aux->all());
        return $aux;
    }

    public static function consulta_alianza_procura_analista(){
        $aux = DB::table('alianza_has_gerente as a_g')->select('a.id','a.solicitud_alianza','a.numero_alianza','a.estatus','un.nombre','a.created_at as fecha_solicitud')->join('alianza as a','a.id','=','a_g.id_alianza')->join('unidad as un','un.id','=','a.id_unidad')->leftjoin('alianza_has_analista as a_a','a_a.id_alianza','=','a_g.id_alianza')->whereNull('a_a.id_alianza')->where('a_g.id_usuario','=',session('id'))->get();
        //->whereNull('a_a.id_alianza')->where('a.estatus','=','Asignado')->whereNotNull('a.numero_alianza')->get();
        //dd('llegue',$aux->all());
        return $aux;
    }

    public static function consulta_alianza_asignar(){
        $aux= DB::table('alianza as a')->select('a.id','solicitud_alianza','a.numero_alianza','a.estatus','un.nombre','a.created_at as fecha_solicitud')->join('unidad as un','un.id','=','a.id_unidad')->where('a.estatus','=','Recibido')->whereNull('numero_alianza')->get();
        //dd('llegue',$aux);
        return $aux;

    }

    public static function consulta_alianza_recibida(){
        //dd('llegue');
        $aux= DB::table('alianza as a')->select('a.id','solicitud_alianza','a.numero_alianza','a.estatus','un.nombre','a.created_at as fecha_solicitud','fecha_recibido','fecha_numeracion')->join('unidad as un','un.id','=','a.id_unidad')->where('a.estatus','!=','No Recibido')->where('a.estatus','!=','En Transito')->get();
        //dd($aux);
        return $aux;
    }

    public static function asignar_alianza($id){
        //dd($id->all());
        $alianza = model_alianza::find($id->id_alianza);
        //dd($alianza);
        $cont = count(DB::table('alianza')->select('id')->where('id_unidad','=',$alianza->id_unidad)->whereNotNull('numero_alianza')->get());
        //dd($cont);
        $siglas = DB::table('unidad as un')->select('siglas')->where('un.id','=',$alianza->id_unidad)->get();
        
        $num = substr(str_repeat(0, 5).$cont+1, - 5);
        //dd($siglas,$num);
        $alianza->numero_alianza = $id->modalidad_contratacion.'-'.$id->tipo_contratacion.'-'.'GPP'.'-'.$siglas[0]->siglas.'-'.$num.'-'.date('Y');
        $alianza->fecha_numeracion = now();
        $alianza->save();
        return true;
    }

    public static function consulta_alianza_procesadas(){
        $aux= DB::table('alianza as a')->select('a.id','a.solicitud_alianza','a.numero_punto','fecha_punto','a.numero_alianza','a.estatus','un.nombre','a.created_at as fecha_solicitud')->join('unidad as un','un.id','=','a.id_unidad')->leftjoin('alianza_has_analista as a_a','a_a.id_alianza','=','a.id')->whereNull('a_a.id_alianza')->where('a.estatus','=','Recibido')->get();
        //dd($aux);
        return $aux;
    }

    public static function lista_solicitud(){
        $consulta = DB::table('alianza as a')->select('a.id','a.solicitud_alianza','a.solicitud_alianza','a.numero_punto','a.numero_alianza','a.fecha_punto','created_at as fecha_solicitud','a.estatus')->where('a.estatus','=','En Transito')->get();
        //dd($consulta[0]);
        return $consulta;
    }
    public static function alianza($id){
        $aux=DB::table('alianza as a')->select('a.id','solicitud_alianza','punto_cuenta','espesificaciones_tecnicas','matriz_tecnica','memorandum','estatus')->where('id','=',$id)->get();
        //dd($aux);
        return $aux;
    }

    public static function alianza_asignada($id){
        $aux=DB::table('alianza as a')->select('a.id','solicitud_alianza','punto_cuenta','espesificaciones_tecnicas','matriz_tecnica','memorandum','estatus')->where('id','=',$id)->get();
        //dd('llegie',$aux);
        return $aux;
    }

    public static function consultar_alianza_id($id){
        $revisar = model_alianza::find($id);
        //dd($revisar);
        return $revisar;
    }

    public static function lista_alianza(){
        $lista = DB::table('alianza as a')->select('a.id','a.solicitud_alianza','a.numero_alianza','a.numero_punto','a.fecha_punto','a.numero_alianza','un.nombre','a.estatus','a.created_at as fecha_solicitud')->join('unidad as un','un.id','=','a.id_unidad')->get();
        //dd($lista);
        return $lista;
    }

    public static function lista_alianza_recepcion(){
        $lista = DB::table('alianza as a')->select('a.id','a.solicitud_alianza','a.numero_alianza','a.numero_punto','a.fecha_punto','a.numero_alianza','un.nombre','a.estatus','a.created_at as fecha_solicitud','a.updated_at as fecha_proceso','fecha_recibido')->join('unidad as un','un.id','=','a.id_unidad')->get();
        //dd($lista);
        return $lista;
    }

    public static function actualizar_solicitud($data){
        //dd($data);
        if($data->estatus == 'Rechazado'){
            DB::update("update alianza_has_analista set fecha_respuesta = '".date('Y-m-d h:m:s')."' where id_alianza = ".$data->id_alianza);
        }
        $act = model_alianza::find($data->id_alianza);
        $siglas = DB::table('unidad as un')->select('siglas')->where('un.id','=',$act->id_unidad)->get();
        //dd('llegue');
        $act->estatus = $data->estatus;
        $act->observaciones = $data->observaciones;
        $act->fecha_recibido = now();
        $act->save();
        return true;
    }
    public static function alianza_unidad(){
        $consulta= DB::table('alianza as a')->select('a.id','numero_alianza')->where('estatus','=','Aprobado')->where('id_unidad','=',session('id_unidad'))->get();
        //dd('llegue a la alianza',$consulta);
        return $consulta;
    }

    public static function consultar_alianza_cosultor($id){
        $consultar = DB::table('alianza as a')->select('id','solicitud_alianza','numero_alianza','punto_cuenta','espesificaciones_tecnicas','matriz_tecnica','memorandum','created_at as fecha_solicitud','estatus','id_estatus','id_unidad')->where('a.id','=',$id)->get();
        return $consultar;
    }
    public static function actualizar_estatus($data){
        //dd($data->all());
        switch ($data->id_estatus) {
          
            case '3':{
                //dd($data->all());
                //dd(count($data->id_empresa));
                for ($i=0; $i < count($data->id_empresa); $i++){
                    $agregar = new model_alianza_has_empresa();
                    $agregar->id_empresa = $data->id_empresa[$i];
                    $agregar->id_alianza = $data->id_alianza;
                    $agregar->save();
                }
                //dd('llegue',DB::table(''));
                $estatus = model_estatus::est($data->id_estatus);
                $actualizar_alianza = model_alianza::find($data->id_alianza);
                $actualizar_alianza->id_estatus = $data->id_estatus;
                $actualizar_alianza->estatus = $estatus[0]->nombre_estatus;
                $actualizar_alianza->save();
                DB::update('update alianza_has_analista set fecha_respuesta = "'.now().'" where id_alianza = '.$data->id_alianza.' and id_usuario = '.session('id'));
                DB::update('update alianza_has_gerente set fecha_respuesta = "'.now().'" where id_alianza = '.$data->id_alianza );
                return true;
                break;
            }
            case '1':
            case '2':
            case '4';
                {
                    //dd($data->all());
                    $estatus = model_estatus::est($data->id_estatus);
                    $actualizar_alianza = model_alianza::find($data->id_alianza);
                    $actualizar_alianza->id_estatus = $data->id_estatus;
                    $actualizar_alianza->estatus = $estatus[0]->nombre_estatus;
                    $actualizar_alianza->save();
                    DB::update('update alianza_has_analista set fecha_respuesta = "'.now().'" where id_alianza = '.$data->id_alianza.' and id_usuario = '.session('id'));
                    DB::update('update alianza_has_gerente set fecha_respuesta = "'.now().'" where id_alianza = '.$data->id_alianza );
                    return true;
                    break;
                }
            case 5:
                {
                    switch ($data->fianza) {
                        case 'SI':
                        { 
                            //dd($data->all());
                             // punto de adjudicación
                            $doc=$data->file('punto_adjudicacion');
                            $ext=strstr($data->file('punto_adjudicacion')->getClientOriginalName(),".",false);
                            $punto_adjudicacion="punto_adjudicacion".'_'.$data->id_alianza.'_'.$data->id_unidad.'_'.date('d-m-Y').$ext;
                            $ruta='adjudicacion_alianza'.'/'.$punto_adjudicacion;
                            $doc->move('adjudicacion_alianza',$punto_adjudicacion);

                            $estatus = model_estatus::est($data->id_estatus);
                            $actualizar_alianza = model_alianza::find($data->id_alianza);
                            $actualizar_alianza->id_estatus = $data->id_estatus;
                            $actualizar_alianza->estatus = $estatus[0]->nombre_estatus;
                            $actualizar_alianza->punto_estatus = $data->ruta;
                            $actualizar_alianza->numero_control_estatus = $data->numero_punto_cuenta_estatus_alianza;
                            $actualizar_alianza->numero_control_estatus = $data->numero_control_estatus_alianza;
                            $actualizar_alianza->fecha_punto_estatus = $data->fecha_punto_estatus_alianza;
                            $actualizar_alianza->save();

                            //fianza laboral
                            $doc=$data->file('fianza_laboral');
                            $ext=strstr($data->file('fianza_laboral')->getClientOriginalName(),".",false);
                            $fianza_laboral="fianza_laboral".'_'.$data->id_alianza.'_'.$data->id_unidad.'_'.date('d-m-Y').$ext;
                            $ruta='adjudicacion_alianza'.'/'.$fianza_laboral;
                            $doc->move('fianza_laboral',$fianza_laboral);

                            $fianza = new model_fianza();
                            $fianza->tipo_fianza = 'Fianza Laboral';
                            $fianza->fianza = $ruta;
                            $fianza->id_alianza = $data->id_alianza;
                            $fianza->save();
                            //------------------------------------------------------

                            //fianza de fiel cumplimiento
                            $doc=$data->file('fianza_fiel_cumplomiento');
                            $ext=strstr($data->file('fianza_fiel_cumplomiento')->getClientOriginalName(),".",false);
                            $fianza_fiel_cumplomiento="fianza_fiel_cumplomiento".'_'.$data->id_alianza.'_'.$data->id_unidad.'_'.date('d-m-Y').$ext;
                            $ruta='fianza_fiel_cumplomiento'.'/'.$fianza_fiel_cumplomiento;
                            $doc->move('fianza_fiel_cumplomiento',$fianza_fiel_cumplomiento);
                            
                            $fianza = new model_fianza();
                            $fianza->tipo_fianza = 'Fianza Fiel Cumplimiento';
                            $fianza->fianza = $data->fianza_laboral;
                            $fianza->id_alianza = $data->id_alianza;
                            $fianza->save();
                            //------------------------------------------------------

                            //fianza de Anticipo
                            $doc=$data->file('fianza_anticipo');
                            $ext=strstr($data->file('fianza_anticipo')->getClientOriginalName(),".",false);
                            $fianza_anticipo="fianza_anticipo".'_'.$data->id_alianza.'_'.$data->id_unidad.'_'.date('d-m-Y').$ext;
                            $ruta='fianza_anticipo'.'/'.$fianza_anticipo;
                            $doc->move('fianza_anticipo',$fianza_anticipo);

                            $fianza = new model_fianza();
                            $fianza->tipo_fianza = 'Fianza de Anticipo';
                            $fianza->fianza = $data->$ruta;
                            $fianza->id_alianza = $data->id_alianza;
                            $fianza->save();
                            //-------------------------------------------------------

                            //Fianza de buena Calidad
                            $doc=$data->file('fianza_buena_calidas');
                            $ext=strstr($data->file('fianza_buena_calidas')->getClientOriginalName(),".",false);
                            $fianza_anticipo="fianza_buena_calidas".'_'.$data->id_alianza.'_'.$data->id_unidad.'_'.date('d-m-Y').$ext;
                            $ruta='fianza_buena_calidas'.'/'.$fianza_anticipo;
                            $doc->move('fianza_buena_calidas',$fianza_anticipo);

                            $fianza = new model_fianza();
                            $fianza->tipo_fianza = 'Fianza de Buena Calidad';
                            $fianza->fianza = $data->$ruta;
                            $fianza->id_alianza = $data->id_alianza;
                            $fianza->save();
                            //--------------------------------------------------------

                            return true;
                            break;
                        }
                        case 'NO':
                            {
                                // punto de adjudicación
                                $doc=$data->file('punto_adjudicacion');
                                //dd($data->all());
                                $ext=strstr($data->file('punto_adjudicacion')->getClientOriginalName(),".",false);
                                $punto_adjudicacion="punto_adjudicacion".'_'.$data->id_alianza.'_'.$data->id_unidad.'_'.date('d-m-Y').$ext;
                                $ruta='adjudicacion_alianza'.'/'.$punto_adjudicacion;
                                $doc->move('adjudicacion_alianza',$punto_adjudicacion);
                                
                                $estatus = model_estatus::est($data->id_estatus);
                                $actualizar_alianza = model_alianza::find($data->id_alianza);
                                $actualizar_alianza->id_estatus = $data->id_estatus;
                                $actualizar_alianza->estatus = $estatus[0]->nombre_estatus;
                                $actualizar_alianza->punto_estatus = $ruta;
                                $actualizar_alianza->numero_punto_estatus = $data->numero_punto_cuenta_estatus_alianza;
                                $actualizar_alianza->numero_control_estatus = $data->numero_control_estatus_alianza;
                                $actualizar_alianza->fecha_punto_estatus = $data->fecha_punto_estatus_alianza;
                                $actualizar_alianza->save();
                                //dd('llegue');
                                //Carta de retención
                                // $doc=$data->file('carta_retencion');
                                // $ext=strstr($data->file('carta_retencion')->getClientOriginalName(),".",false);
                                // $carta_retencion="carta_retencion".'_'.$data->id_alianza.'_'.$data->id_unidad.'_'.date('d-m-Y').$ext;
                                // $ruta='carta_retencion'.'/'.$carta_retencion;
                                // $doc->move('carta_retencion',$carta_retencion);

                                // $carta_retencion = new model_carta_retencion();
                                // $carta_retencion->carta_retencion = $ruta;
                                // $carta_retencion->id_alianza = $data->id_alianza;
                                // $carta_retencion->save();
                                return true;
                                break;
                            } 
                    }
                }
            case 6:{
                $doc=$data->file('contrato_firmado');
                $ext=strstr($data->file('contrato_firmado')->getClientOriginalName(),".",false);
                $contrato_firmado="contrato_firmado".'_'.$data->id_alianza.'_'.$data->id_unidad.'_'.date('d-m-Y').$ext;
                $ruta='contrato_firmado'.'/'.$contrato_firmado;
                $doc->move('contrato_firmado',$contrato_firmado);

                $estatus = model_estatus::est($data->id_estatus);
                $actualizar_alianza = model_alianza::find($data->id_alianza);
                $actualizar_alianza->id_estatus = $data->id_estatus;
                $actualizar_alianza->estatus = $estatus[0]->nombre_estatus;
                $actualizar_alianza->punto_estatus = $data->punto_adjudicacion;
                $actualizar_alianza->numero_control_estatus = $data->numero_punto_cuenta_estatus_alianza;
                $actualizar_alianza->numero_control_estatus = $data->numero_control_estatus_alianza;
                $actualizar_alianza->fecha_punto_estatus = $data->fecha_punto_estatus_alianza;
                $actualizar_alianza->save();
                }
            case 7:{
                
            }
            default:
                //dd('llegue al defualt');
                break;
        }
        }
}