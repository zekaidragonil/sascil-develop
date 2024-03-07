<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\model_proyecto;
use App\Models\model_presupuesto;
use App\Models\model_clasificador_presupuestario;
use App\Models\model_fondo;
use DB;


class clasificador_presupuestarioController extends Controller
{
    public function index()
    {

    }
    public function create()
    {
        //
    }

    public function partida_presupuestaria(Request $request) // distribucion del POA por partida presupuestaria
    {
        if(session('id'))
        {
            //dd('llegue al calsificador',$request->all());
            if($request->boton1=='1')
                {
                    $numero_proyecto=$request->id_proyecto;
                    //dd($numero_proyecto);
                    $clasificador_presupuestario=model_clasificador_presupuestario::consulta_clasificador();//campo de selecion del calsificador
                    $disponible = model_presupuesto::calculo_monto($numero_proyecto);
                    //dd($disponible);
                    $monto_proyecto= model_proyecto::consulta_monto_proyecto($numero_proyecto);
                    //dd($monto_proyecto);
                    $id_unidad=$request->id_unidad;
                    //dd($id_unidad);
                    $consulta_partida = model_presupuesto::consulta_partida($numero_proyecto);
                    if($consulta_partida!=[])
                    {
                        $asignado=0;
                        foreach ($consulta_partida as $key => $value) {
                            $asignado=$asignado+$value->monto;
                        }
                    }
                    //dd($asignado);
                    //$fondo=model_fondo::fondo();//campo de seleccion del fondo

                    if($disponible)
                        return view('supervisor.carga_partida_presupuesto',compact('consulta_partida','monto_proyecto','numero_proyecto','clasificador_presupuestario','id_unidad','asignado'));
                    else
                        return view('notf.notf32');//notificacion que indica que no se puede agregar mas partidas presupuestarias
                }
            if($request->boton2=='1')
                {
                    $numero_proyecto=$request->id_proyecto;
                    //dd($numero_proyecto);
                    $clasificador_presupuestario=model_clasificador_presupuestario::consulta_clasificador();//campo de selecion del calsificador
                    //$disponible = model_presupuesto::calculo_monto($numero_proyecto);
                    //dd($disponible);
                    $monto_proyecto= model_proyecto::consulta_monto_proyecto($numero_proyecto);
                    //dd($monto_proyecto);
                    $id_unidad=$request->id_unidad;
                    //dd($id_unidad);
                    $consulta_partida = model_presupuesto::consulta_partida($numero_proyecto);
                    //dd($consulta_partida->all());
                    $fondo=model_fondo::fondo();//campo de seleccion del fondo
                    return view('supervisor.ver_partida_proyecto',compact('consulta_partida','monto_proyecto','numero_proyecto','clasificador_presupuestario','id_unidad'));
                }
        }else
            return view('notf.notf34');
    }
    public function show(Request $id)
    {
        //dd($id->all());
        if(session('id'))
        {
            $existe=model_presupuesto::partidas_asignadas($id->all());
            //dd($existe);
            if($existe)
            {
                $aux=model_presupuesto::asignacion_presupuestaria($id);
                if($aux)
                    return view('notf.notf30');
                else
                    return view('notf.notf31');
            }
            else
            {
                return view('notf.notf33');
            }
        }else
            return view('notf.notf34');

    }
    public function consulta_clasificador_hasta($id,$clasf)
    {
        //dd($id,$clasf);
        $clasificador = model_clasificador_presupuestario::consulta_clasificador_hasta($id,$clasf);
        return $clasificador;
    }
    public function consulta_clasificador_desde($id)
    {
        //dd('llegue',$id);
        $clasificador = model_clasificador_presupuestario::consulta_clasificador_desde($id);
        return $clasificador;
    }
    public function destroy($id)
    {
        //
    }
}
