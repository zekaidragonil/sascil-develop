<?php

namespace App\Http\Controllers;

use App\Models\model_factura;
use App\Models\model_instrumento_legal;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Reader\Xml\Style\NumberFormat;

class facturaController extends Controller
{
    public function view_cargar_factura()
    {
        //dd('llegue a este punto');
        //validar que se pueda cargar una factura nueva al contrato
        $instrumento = model_instrumento_legal::instrumento_legal(session('id_unidad'));
        return view('usuario.view_cargar_factura',compact('instrumento'));
    }
    public function cargar_factura(Request $request)
    {
        dd($request->all());
        $aux = model_factura::factura($request->id_contrato);
        if($aux[0]->total==null)
            $aux[0]->total = 0;

        $total = floatval(str_replace('.','',$request->monto_factura)) + floatval($aux[0]->total);
        //dd($request->id_contrato);
        $monto = model_instrumento_legal::instrumento($request->id_contrato);
        //dd($monto,$total);
        if($total > $monto[0]->monto)
            return view('notf.notf93');
        else
            {   
                if ($request->tipo_factura==1) {
                    //es una anticipo
                    $doc=$request->file('adj_anticipo');
                    $ext=strstr($request->file('adj_anticipo')->getClientOriginalName(),".",false);
                    $nombre_solicitud="anticipo".'_'.$request->id_contrato.'_'.session('id_unidad').'_'.date('Y-m-d').$ext;
                    $url= 'anticipo/'. $nombre_solicitud;
                    $doc->move('anticipo/', $url);
                    $factura = model_anticipo::ingresar_anticipo($request);
                }
                else{
                    // es un factura
                    $doc=$request->file('');
                    $ext=strstr($request->file('punto_cuenta')->getClientOriginalName(),".",false);
                    $nombre_solicitud="solicitud_modificacion_presupuestaria".'_'.session('id_unidad').'_'.date('Y-m-d').$ext;
                    $url= 'modificacion_presupuestaria/'. $nombre_solicitud;
                    $doc->move('modificacion_presupuestaria', $url);
                    $factura = model_factura::ingresar_factura($request);
                }
                
            }
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
