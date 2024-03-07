<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use DB;
class model_proyecto extends Model
{
    use HasFactory;
    protected $table='proyecto';
    protected $primaryKey='id';

    public function unidad($related, $foreignKey = null, $localKey = null)
    {
        return $this->BelongsTo('App\model_unidad');
    }
    public static function proyec($id_unidad)
    {
        $proyecto=DB::table('proyecto')->select('id')->orderBy('id','desc')->where('id_unidad','=',$id_unidad)->limit('1')->get();
        //dd($proyecto);
        return $proyecto;
    }
    public function presupuesto()
    {
        return $this->hasMany('App\model_presupuesto');
    }
    public function solicitud()
    {
        return $this->hasMany('App\model_proyecto_solic');
    }
    public function traspaso(){
        return $this->hasMany('App\model_traspaso');
    }

    public static function poa($unidad)//consulta los proyectos que estan vigentes en el año en curso por unidad
    {
        $proyecto=DB::table('proyecto as p')->select('numero','proyecto_presupuestario','nombre_proyecto','fecha','categoria','fondo','id_unidad')->join('fondo as f','f.id','=','p.id_fondo')->where('id_unidad','=',$unidad)->orderBY('p.id','desc')->limit('1')->get();
        //dd($proyecto);
        if(count($proyecto)==0)
            return false;
        $fecha_pro=date('Y/m/d',strtotime($proyecto[0]->fecha));//calculo de la fecha en que se cargo el proyecto POA
        $fecha_actual=date('Y/m/d');//fecha actual
        //dd(strtotime($fecha_pro)-strtotime($fecha_actual),$fecha_pro,$fecha_actual);
        $diff = abs(strtotime($fecha_actual)-strtotime($fecha_pro));//calculo de la dirferencia entre las fechas
        //dd($diff);
        $anio = intval(floor($diff/(365*60*60*24)));//calculo del intervalo entre las fechas
        //si la diferencia arroja 0 entonces el poa esta vigente
        //dd($anio);
        if($anio<1)
            return true;//el proyecto esta vigente y la unidad administrativa puede hacer solicitudes
        else
            return false;//el proyecto esta vencido o no existe y no se pueden hacer solicitudes hasta que se cargue
    }
    public static function ultimo($ente)
    {
        $aux = DB::table('proyecto')->select('numero')->where('id_ente','=',$ente)->orderByDesc('numero')->limit('1')->get();
        //dd($aux);
        if(count($aux)==0)
            $numero = 1;
        else
            $numero = $aux[0]->numero + 1;
        //dd($numero);
        return $numero;

    }
    public static function guardar_proyecto($proyecto)
    {
        //dd($proyecto);
        //dd('llegue la modelo',$proyecto);
        $aux=str_replace('.','',$proyecto->monto);
        $monto=floatval($aux);
        $guardar = new model_proyecto();
        $guardar->numero=$proyecto->numero+1;
        $guardar->proyecto_presupuestario=$proyecto->presupuestario;
        $guardar->nombre_proyecto=$proyecto->nombre_proyecto;
        $guardar->nombre_subproyecto = $proyecto->nombre_subproyecto;
        $guardar->fecha=date('Y-m-d');
        $guardar->categoria=$proyecto->categoria;
        $guardar->id_fondo=$proyecto->fuente_finan_poa;
        $guardar->monto_proyecto=$monto;
        $guardar->id_ente = session('id_ente');
        $guardar->id_unidad = $proyecto->unidad_administrativa;
        $guardar->fecha_poa = $proyecto->anio;
        $guardar->save();
        return true;
    }
    public static function unidad_proyecto()
    {
        $unidades=DB::table('unidad as un')->select('un.id','nombre')->where('id_ente','=',session('id_ente'))->get();
        //$unidades=DB::table('unidad as un')->select('un.id','nombre')->leftjoin('solicitud as so','so.id_unidad','<>','un.id')->join('proyecto as pro','pro.id','=','so.id_proyecto')->distinct('un.id')->get();
        return $unidades;
    }
    public static function proyecto_unidad()
    {
        //$proyecto_unidad=DB::table('proyecto')->select('id','nombre_proyecto')->where('id_unidad','=',session('id_unidad'))->where('monto_proyecto','>',0)->get();
        $poa = DB::table('presupuesto as pre')->select('pro.proyecto_presupuestario','pro.nombre_proyecto','pro.id as id_proyecto','c_p.id','c_p.codigo_partida','c_p.descripcion','pro.monto_proyecto','pre.monto','pre.saldo_disponible','fondo','pro.fecha')->join('proyecto as pro','pro.id','=','pre.id_proyecto')->join('fondo as fn','fn.id','=','pre.id_fondo')->join('clasificador_presupuestario as c_p','c_p.id','=','pre.id_clasificador_presupuestario')->where('pre.id_unidad','=',session('id_unidad'))->where('pro.fecha','=',date('Y'))->get();
        //comparar con ranfo de fechas para consultar el presupuesto disponible por unidad
        //dd('llegue',$poa);
        return $poa;
    }
    public static function proyecto()
    {
        //dd("lleque, aqui");
        //$presupuesto=DB::table('certificacion_presupuestaria as c_p')->select('pro.id','pro.nombre_proyecto','pro.categoria','fuente_financiamiento','monto','un.nombre','codigo_partida')->join('presupuesto as pre','pre.id','=','c_p.id')->join('proyecto as pro','pro.id','=','pre.id_proyecto')->join('clasificador_presupuestario as c_p2','c_p2.id','=','pre.id_clasificador_presupuestario')->join('unidad as un','un.id','=','pre.id')->get();
        $proyecto=DB::table('proyecto as pro')->select('proyecto_presupuestario','pro.id','numero','nombre_proyecto','categoria','f.fondo','monto_proyecto','pro.id_unidad','un.nombre','pro.created_at')->join('unidad as un','un.id','=','pro.id_unidad')->join('fondo as f','f.id','=','pro.id_fondo')->get();
        //dd($proyecto);
        return $proyecto;
    }
    public static function consulta_monto_proyecto($id)
    {
        $aux=DB::table('proyecto as pro')->select('pro.id','id_fondo','f.fondo','nombre_proyecto','monto_proyecto')->join('fondo as f','f.id','=','id_fondo')->where('pro.id','=',Intval($id))->get();
        //dd($aux[0]);
        return $aux[0];
    }

    public static function consulta($id)//consulta de informacion de proyecto para solicitar certificacion presupuestaria
    {
        //dd($id);
        $aux;
        for ($i=0; $i < $id->conteo; $i++) { 
            $count=(string)$i;
            $aux_proyecto = 'id_proyecto';
            $id_proyecto=$aux_proyecto.$count;
            
            $aux[$i]=DB::table('proyecto')->select('monto_proyecto','id','numero')->where('id_unidad','=',session('id_unidad'))->where('id','=',$id->$id_proyecto)->get();
        }
        
        return $aux; //infromacion adicional para la tabla certificacion presupuetaria
    }
    public static function id_proyecto($proyecto,$id_unidad,$id_fondo){
        //dd($proyecto,$id_unidad,$id_fondo);
        $id_proyecto = DB::table('proyecto')->select('id')->where('nombre_subproyecto','=',$proyecto)->where('id_unidad','=',$id_unidad)->where('id_fondo','=',$id_fondo)->get();
        //dd($id_proyecto[0]->id);
        return $id_proyecto;
    }
    public static function consulta_proyectos(){
        $consulta = DB::table('proyecto as p')->select('p.id','p.proyecto_presupuestario','p.nombre_proyecto','p.categoria','f.fondo','p.monto_proyecto','fecha')->join('fondo as f','f.id','=','p.id_fondo')->where('p.id_unidad','=',session('id_unidad'))->get();
        return $consulta;
    }
    public static function nombre_proyecto($id){
        $nombre=DB::table('proyecto as pro')->select('id','nombre_proyecto','proyecto_presupuestario')->where('id','=',$id)->where('id_unidad','=',session('id_unidad'))->get();
        return $nombre;
    }
    public static function ultimo_anio(){
        $anio = DB::table('proyecto')->select('id','fecha_poa')->orderBy('id','desc')->limit(1)->where('fecha_poa','=',date('Y'))->get();
        //dd(date('Y'),$anio);
        return $anio;
    }
    public static function anio(){
        //dd('llegue al proyecto');
        $anio = DB::table('proyecto as pro')->select('fecha_poa')->groupby('fecha_poa')->get();
        return $anio;
    }
    public static function proyecto_fuente($id){
        $proyectos=DB::table('presupuesto as pre')->select('pre.id_proyecto','pro.nombre_proyecto','proyecto_presupuestario')->distinct('pre.id_proyecto')->join('proyecto as pro','pro.id','=','pre.id_proyecto')->join('unidad as un','un.id','=','pre.id_unidad')->where('pre.id_unidad','=',session('id_unidad'))->where('pre.id_fondo','=',$id)->get();
        return $proyectos;
    } 

    public static function area_funcional($id){
        $area_funcional = DB::table('proyecto as pro')->select('pro.id','proyecto_presupuestario','nombre_proyecto')->join('unidad as un','un.id','pro.id_unidad')->where('pro.id_unidad','=',$id)->get();
        return $area_funcional;
    }
    // consulta de areas funcionales por unidad
    public static function area_funcional_unidad($id){
        $area_funcional = DB::table('proyecto as pro')->select('pro.id','proyecto_presupuestario','nombre_proyecto')->join('unidad as un','un.id','pro.id_unidad')->where('pro.id_fondo','=',$id)->where('pro.id_unidad','=',session('id_unidad'))->get();
        return $area_funcional;
    }
    //consulta de un proyecto en todas las unidades para el reporte del gerente de presupuesto 
    public static function proyecto_general($id){

        $proyecto_general= DB::table('presupuesto as pre')->select('id_proyecto','nombre_proyecto')->join('proyecto as pro','pro.id','=','pre.id_proyecto')->where('pre.id_unidad','=',$id)->get();
        return $proyecto_general;
    }
}
