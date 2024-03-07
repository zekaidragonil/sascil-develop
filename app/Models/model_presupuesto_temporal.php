<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class model_presupuesto_temporal extends Model
{
    use HasFactory;
    protected $table = 'presupuesto_temporal';
    protected $primaryKey='id';

    public function fondo(){
        return $this->BelongsTo('App\model_fondo');
    }
    public function unidad(){
        return $this->BelongsTo('App\model_unidad');
    }
    public function clasificador_presupuestario(){
        return $this->BelongsTo('App\model_clasificador_presupuestario');    
    }
    public static function consultar($const){
        //dd($const->all());
        $aux=DB::table('presupuesto_temporal as p_t')->select('p_t.id')->join('modificacion_presupuestaria as m_p','m_p.id','=','p_t.id_modificacion_presupuestaria')->where('id_unidad','=',session('id_unidad'))->where('m_p.id_proyecto','=',$const->id_proyecto)->where('p_t.id_clasificador_presupuestario','=',$const->clasificador_presupuestario)->get();
        //dd($aux);
        return $aux;
    }

    public static function agregar($nuevo){
        //dd($nuevo->all());
        $mod_presupuestaria = DB::table('modificacion_presupuestaria')->select('id')->orderBy('id','desc')->limit('1')->get();
        //dd($nuevo->id_moneda);
        for ($i=0; $i < count($nuevo->id_partida); $i++) { 
            $agregar = new model_presupuesto_temporal();
            $agregar->id_modificacion_presupuestaria = $mod_presupuestaria[0]->id; 
            $agregar->monto_asignar_divisa = doubleval(str_replace(',','.',str_replace('.','',$nuevo->monto_asignar_divisa[$i])));
            $agregar->id_moneda = $nuevo->id_moneda;
            $agregar->tasa = doubleval(str_replace(',','.',str_replace('.','',$nuevo->tasa)));
            $agregar->monto_asignar_bs = doubleval(str_replace(',','.',str_replace('.','',$nuevo->monto_asignar_bs[$i])));
            $agregar->id_clasificador_presupuestario = $nuevo->id_partida[$i];
            $agregar->save();
        }
        return true;
    }
    public static function lista_presupuesto($id){
        $consulta = DB::table('modificacion_presupuestaria as m_p')->select('m_p.id','pr.nombre_proyecto','pr.proyecto_presupuestario','monto_asignar_divisa','monto_asignar_bs','f.fondo','m.tipo_moneda','tasa','estatus')->join('proyecto as pr','pr.id','=','m_p.id_proyecto')->join('fondo as f','f.id','=','m_p.id_fondo')->join('moneda as m','m.id','=','m_p.id_moneda')->where('m_p.id_unidad','=',session('id_unidad'))->get();
        //dd($consulta);
        // $consulta = DB::table('sascil.modificacion_presupuestaria as m_p')->select('pr.nombre_proyecto','c_p.codigo_partida','c_p.descripcion','m_p.monto_asignar_bs','f.fondo','m_p.punto_cuenta_adjudicacion','m_p.estatus','pr.proyecto_presupuestario','m_p.punto_cuenta')->join('presupuesto_temporal as p_t','m_p.id','=','p_t.id_modificacion_presupuestaria')->join('clasificador_presupuestario as c_p','c_p.id','=','p_t.id_clasificador_presupuestario')->join('proyecto as pr','pr.id','=','m_p.id_proyecto')->join('fondo as f','f.id','=','m_p.id_fondo')->join('moneda as m','m.id','=','m_p.id_moneda')->where('id_proyecto','=',$id)->get();
        return $consulta;
    }
     public static function lista_presupuestaria_global(){
        $consulta=DB::table('modificacion_presupuestaria as m_p')->select('m_p.id','un.nombre','pro.nombre_proyecto','pro.proyecto_presupuestario','f.fondo','m_p.punto_cuenta','punto_cuenta_adjudicacion','m_p.monto_asignar_divisa','m_p.estatus')->join('fondo as f','f.id','=','m_p.id_fondo')->join('proyecto as pro','pro.id','=','m_p.id_proyecto')->join('unidad as un','un.id','=','m_p.id_unidad')->join('modificacion_analista as m_a','m_a.id_presupuesto_temporal','=','m_p.id')->where('m_a.id_usuario','=',session('id'))->/*where('m_p.estatus','=','Asignado')->*/get();
        //dd($consulta);
        return $consulta;
    }
    public static function rechazar($data){
        //dd($data);
        $act =model_modificacion_presupuestaria::find($data['id_presupuesto_temporal']);
        $act->estatus='Rechazado';
        $act->save();
        return true;
    }
    public static function presupuesto_temporal_asignar(){

        $consultar = DB::table('modificacion_presupuestaria as m_p')->select('m_p.id','un.nombre as nombre_unidad','nombre_proyecto','m_p.monto_asignar_divisa','estatus','fondo','tasa','tipo_moneda','monto_asignar_bs')->join('proyecto as pro','pro.id','=','m_p.id_proyecto')->join('unidad as un','un.id','=','m_p.id_unidad')->join('fondo as f','f.id','=','m_p.id_fondo')->join('moneda as m','m.id','=','m_p.id_moneda')->where('estatus','=','En Transito')->get();
        //dd($consultar);
        return $consultar;
        
    }
    public static function consulta_temporal_consulta($id){
        //dd($id);
        $consulta = DB::table('presupuesto_temporal as p_t')->select('p_t.monto_asignar_divisa','p_t.monto_asignar_bs','c_p.codigo_partida')->join('clasificador_presupuestario as c_p','c_p.id','=','id_clasificador_presupuestario')->where('p_t.id_modificacion_presupuestaria','=',$id)->get();
        return $consulta;
    }
    public static function consulta_temporal($id){
        //dd($id);
        $consulta = DB::table('presupuesto_temporal as p_t')->select('p_t.monto_asignar_divisa','tipo_moneda','tasa','p_t.monto_asignar_bs','c_p.codigo_partida')->join('clasificador_presupuestario as c_p','c_p.id','=','id_clasificador_presupuestario')->join('moneda as m','m.id','=','moneda')->where('p_t.id_modificacion_presupuestaria','=',$id)->get();
        return $consulta;
    }
}
