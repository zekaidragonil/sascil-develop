@extends('principal')
@section('lista_instrumentos_legales')
<div class="col-xs-12">
    <div class="box-content">
        <h4 class="box-title">Lista de Instrumentos Legales Suscritos</h4>
        <table id="example" class="table table-striped table-bordered display" style="width:100%">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>N° Contratación</th>
                    <th>Fecha de Suscripción</th>
                    <th>Fecha de Registro</th>
                    <th>Contrato</th>
                    <th>Plazo de Entrega</th>
                    <th>Monto</th>
                    <th>Tipo de Moneda</th>
                    <th>Estatus</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>N°</th>
                    <th>N° Contratación</th>
                    <th>Fecha de Suscripción</th>
                    <th>Fecha de Registro</th>
                    <th>Contrato</th>
                    <th>Plazo de Entrega</th>
                    <th>Monto</th>
                    <th>Tipo de Moneda</th>
                    <th>Estatus</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($consulta_contratos as $key => $value)
                    <tr>
                        <form action="{{url('#')}}" method="post" >
                            @csrf
                            <td>
                                {{$value->id}}
                            </td>
                            <td>{{$value->numero}}</td>
                            <td>{{date('d-m-Y h:i:s a',strtotime($value->fecha_suscripcion))}}</td>
                            <td>{{date('d-m-Y h:i:s a',strtotime($value->fecha_registro))}}</td>
                            <td><a href="{{$value->pdf}}" target="_blanck">Ver contratos</a></td>
                            <td>{{date('d-m-Y h:i:s a',strtotime($value->plazo_entrega))}}</td>
                            <td>{{number_format($value->monto,2,',','.')}}</td>
                            <td>{{$value->tipo_moneda}}</td>
                            <td>{{$value->nombre_estatus}}</td>
                        </form>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.box-content -->
</div>
@endsection