@extends('principal')
@section('ver_partida_proyecto')

@if($consulta_partida != [])
<div class="col-lg-12 col-xs-12">
    <div class="box-content">
        <h4 class="box-title">Partidas Presupuestarias Asignadas al proyecto "<u>{{$monto_proyecto->nombre_proyecto}}</u>"</h4>
        <p><strong class="text-info"></strong> Total del monto del proyecto: <b>{{number_format($monto_proyecto->monto_proyecto,2,',','.')}} Bs</b></p>
        <hr>
        <table id="example" class="table table-striped">
            <thead>
                <tr>
                    <th>Codigo de la Partida</th>
                    <th>Descripción</th>
                    <th>Monto</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($consulta_partida as $value)
                    <tr>
                        <td>{{$value->codigo_partida}}</td>
                        <td>{{$value->descripcion}}</td>
                        <td>{{number_format($value->monto,2,',','.')}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <hr>
        <p><strong class="text-info">Note:</strong> Estas son las partidas presupuestarias asignadas a este proyecto</p>
    </div>
    <!-- /.box-content -->
</div>
@endif
@endsection
