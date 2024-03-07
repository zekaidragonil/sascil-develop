@extends('principal')
@section('lista_modificaciones')
<div class="col-xs-12">
    <div class="box-content">
        <h4 class="box-title">Lista de Solicitudes de Modificación Presupuestaria</h4>
        <!-- /.dropdown js__dropdown -->
        <table id="example" class="table table-striped table-bordered display" style="width:100%">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Proyecto Presupuestario</th>
                    <th>Nombre del Proyecto</th>
                    <th>Fondo</th>
                   
                    <th>Unidad Solicitante</th>
                    <th>Monto</th>
                    <th>Analista</th>
                    <th>Estatus</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>N°</th>
                    <th>Proyecto Presupuestario</th>
                    <th>Nombre del Proyecto</th>
                    <th>Fondo</th>
                   
                    <th>Unidad Solicitante</th>
                    <th>Monto</th>
                    <th>Analista</th>
                    <th>Estatus</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($lista as $key => $value)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$value->proyecto_presupuestario}}</td>
                        <td style="width: 25%">{{$value->nombre_proyecto}}</td>
                        <td>{{$value->fondo}}</td>

                        <td>{{$value->nombre_unidad}}</td>
                        <td align="right">{{number_format($value->monto_asignar_bs,2,',','.')}}</td>
                        <td>
                            @if($value->nombre != null || $value->apellido != null)
                                {{$value->nombre}} {{$value->apellido}}
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            @if($value->estatus=='Aprobado')
                                <label style="color:green">{{$value->estatus}}</label>
                            @endif
                            @if($value->estatus=='En Transito')
                                <label style="color:yellowgreen">{{$value->estatus}}</label>
                            @endif
                            @if($value->estatus=='Rechazado')
                                <label style="color:red">{{$value->estatus}}</label>
                            @endif
                            @if ($value->estatus=='Revisado')
                                <label style="color:orange">{{$value->estatus}}</label>
                            @endif
                            @if ($value->estatus=='Reversado')
                                <label style="color:grey">{{$value->estatus}}</label>
                            @endif
                        </td>   
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
            <!-- /.box-content -->
</div>

@endsection