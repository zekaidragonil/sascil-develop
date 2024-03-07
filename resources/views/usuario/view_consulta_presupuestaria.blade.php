@extends('principal')
@section('consulta_presupuestaria')
<div class="col-xs-12">
    <div class="box-content">
        <h4 class="box-title">Partidas Presupuestarias Asignadas a la Unidad: {{$nombre_unidad}}</h4>
        <!-- /.dropdown js__dropdown -->
        <br>
        <table id="example" class="table table-striped table-bordered display">
            <thead>
                <tr>
                    <th style="width: 12%">Código de Proyecto</th>
                    <th style="width: 18%">Proyecto</th>
                    <th>Partida</th>
                    <th style="width: 15%">Descripción</th>
                    <th>Fondo</th>
                    <th>Monto Original</th>
                    <th>Saldo Disponible</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Código de Proyecto</th>
                    <th>Proyecto</th>
                    <th>Partida</th>
                    <th>Descripción</th>
                    <th>Fondo</th>
                    <th>Monto Original</th>
                    <th>Saldo Disponible</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($proyecto as $key=>$value)
                <tr>
                    <td><label style="margin-top: 15px;">{{$value->proyecto_presupuestario}} <input type="text" hidden="true" value="{{$value->proyecto_presupuestario}}" name="codigo_proyecto{{$key}}"> </label></td>
                    <td>
                        <input type="text" name="conteo" value="{{count($proyecto)}}" hidden="true">
                        <input type="text" name="id_proyecto{{$key}}" hidden="true" value="{{$value->id_proyecto}}"><label style="margin-top: 12px;">{{$value->nombre_proyecto}}</label>
                    </td>
                    <td>
                        <input type="text" name="id_partida{{$key}}" hidden="true" value="{{$value->codigo_partida}}"><label style="margin-top: 12px;">{{$value->codigo_partida}}</label>
                    </td>
                    <td>
                        <label style="margin-top: 12px;" >{{$value->descripcion}}</label>
                    </td>
                    <td>
                        <label style="margin-top: 12px;" >{{$value->fondo}}</label>
                        <input type="text" name="fondo{{$key}}" hidden="true" value="{{$value->fondo}}">
                    </td>
                    <td align="right">
                            <label style="margin-top: 12px;">{{number_format($value->monto,2,',','.')}}</label>
                        <input type="text" name="monto_partida{{$key}}" hidden="true" value="{{$value->monto}}">
                    </td>
                    <td align="right">
                        <input type="text" hidden="true" value="{{count($proyecto)}}" id="aux">
                        <input type="text" value="{{number_format($value->saldo_disponible,2,',','.')}}"hidden ="true" id="monto{{$key}}" name="monto{{$key}}">
                        @if ($value->saldo_disponible != 0.0)
                            <label style="margin-top: 12px;color:green">{{number_format($value->saldo_disponible,2,',','.')}}</label>
                        @else
                            <label style="margin-top: 12px;color:rgb(184, 57, 57)">{{number_format($value->saldo_disponible,2,',','.')}}</label>
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