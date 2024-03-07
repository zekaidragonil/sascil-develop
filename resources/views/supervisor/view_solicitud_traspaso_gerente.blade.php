@extends('principal')
@section('view_solicitudes_procesadas_gerente')
<div class="row small-spacing">
    <div class="col-xs-12">
        <div class="box-content">
            <h4 class="box-title">Lista de modificaciones de la solicitud de traspaso N°: {{$solicitud_traspaso[0]->solicitud_traspaso}} </h4>
            <!-- /.box-title -->
            <table id="example" class="table table-striped table-bordered display" style="width:100%">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Area Funcional Cedente</th>
                        <th>Partida Cedente</th>
                        <th>Monto Origen</th>
                        <th>Proyecto Receptor</th>
                        <th>Partida Receptora</th>
                        <th>Monto a Ceder</th>
                        <th>Monto Disponible</th>
                        <th>Monto Total</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>N°</th>
                        <th>Area Funcional Cedente</th>
                        <th>Partida Cedente</th>
                        <th>Monto Origen</th>
                        <th>Proyecto Receptor</th>
                        <th>Partida Receptora</th>
                        <th>Monto a Ceder</th>
                        <th>Monto Disponible</th>
                        <th>Monto Total</th>
                    </tr>
                </tfoot>
                <tbody>
                @foreach ($solicitud_traspaso as $key => $value)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$value->proyecto_origen}}</td>
                        <td>{{$value->partida_origen}}</td>
                        <td>{{number_format($value->monto_origen,2,',','.')}}</td>
                        <td>{{$value->proyecto_destino}}</td>
                        <td>{{$value->partida_destino}}</td>
                        <td>{{number_format($value->monto_solicitado,2,',','.')}}</td>
                        <td>{{number_format($value->monto_disponible,2,',','.')}}</td>
                        <td>{{number_format($value->monto_total,2,',','.')}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <br>
            <a href="asignar_traspaso" class="btn btn-rounded btn-warning"><i class="fa fa-arrow-left"></i> Ir Atras </a>
        </div>
        <!-- /.box-content -->
    </div>
</div>

@endsection