@extends('principal')
@section('view_solicitudes_procesadas')
<div class="row small-spacing">
    <div class="col-xs-12">
        <div class="box-content">
            <h4 class="box-title">Lista de modificaciones de la solicitud de traspaso N°: {{$consulta_traspaso[0]->solicitud_traspaso}} </h4>
            @if ($consulta_traspaso[0]->estatus == "Aprobado")
            <label for="">Puede desacargar la solicitud de traspaso aprobada <a class="btn btn-xs btn-circle btn-info" href="{{$consulta_traspaso[0]->solicitud_credito_presupuestario}}" target="_blank"><i class="fa fa-search"></i></a></label>
            @endif
            @if ($consulta_traspaso[0]->estatus == "Rechazada")
                <label for="">Observaciones por las cuales la solicitud de traspaso fue rechazada</label>
                <p>{{$consulta_traspaso[0]->observacion}}</p>
                <br>
            @endif
            <!-- /.box-title -->
            <table id="example" class="table table-striped table-bordered display" style="width:100%">
                <thead>
                    <tr >
                        <th colspan="5" style="background-color: rgb(239, 221, 221)"><center><h3>POSICIÓN PRESUPUESTARIA CEDENTE<h3></center></th>
                        <th colspan="5" style="background-color: rgb(202, 224, 202)"><center><h3>POSICIÓN PRESUPUESTARIA RECEPTORA<h3></center></th>
                    </tr>
                    <tr>
                        <th>N°</th>
                        <th>Proyecto Cedente</th>
                        <th>Partida Cedente</th>
                        <th>Monto Cedido</th>
                        <th>Monto Disponible</th>
                        <th>Proyecto Receptor</th>
                        <th>Partida Receptora</th>
                        <th>Monto a Recibir</th>
                        <th>Monto Original</th>
                        <th>Monto Disponible</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>N°</th>
                        <th>Proyecto Cedente</th>
                        <th>Partida Cedente</th>
                        <th>Monto Origen</th>
                        <th>Monto Disponible</th>
                        <th>Proyecto Receptor</th>
                        <th>Partida Receptora</th>
                        <th>Monto a Recibir</th>
                        <th>Monto Original</th>
                        <th>Monto Disponible</th>
                    </tr>
                </tfoot>
                <tbody>
                @foreach ($consulta_traspaso as $key => $value)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$value->proyecto_origen}}</td>
                        <td>{{$value->partida_origen}}</td>
                        <td align="right">{{number_format($value->monto_solicitado,2,',','.')}}</td>
                        <td align="right">{{number_format($value->monto_origen,2,',','.')}}</td>
                        <td>{{$value->proyecto_destino}}</td>
                <td>{{$value->partida_destino}}</td>
                        <td align="right">{{number_format($value->monto_solicitado,2,',','.')}}</td>
                        <td align="right" >{{number_format($value->monto_disponible,2,',','.')}}</td>
                        <td align="right">{{number_format($value->monto_total,2,',','.')}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <br>
            <a href="lista_traspaso_unidad" class="btn btn-rounded btn-warning"><i class="fa fa-arrow-left"></i> Ir Atras </a>
        </div>
        <!-- /.box-content -->
    </div>
</div>

@endsection