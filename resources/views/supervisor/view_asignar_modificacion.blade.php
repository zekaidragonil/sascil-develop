@extends('principal')
@section('view_aignar_modificacion')
<div class="col-xs-12">
    <div class="box-content">
        <h4 class="box-title">Lista de Solicitudes de Modificación Presupuestaria a Asignar</h4>
        <!-- /.dropdown js__dropdown -->
        <table id="example" class="table table-striped table-bordered display" style="width:100%">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Unidad Solicitante</th>
                    <th>Nombre del Proyecto</th>
                    <th>Fuente</th>
                    <th>Monto Divisa</th>
                    <th>Tasa</th>
                    <th>Monto Bs</th>
                    <th>Estatus</th>
                    <th>Analista</th>
                    <th>Asignar</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>N°</th>
                    <th>Unidad Solicitante</th>
                    <th>Nombre del Proyecto</th>
                    <th>Fuente</th>
                    <th>Monto Divisa</th>
                    <th>Tasa</th>
                    <th>Monto Bs</th>
                    <th>Estatus</th>
                    <th>Analista</th>
                    <th>Asignar</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($presupuesto_temporal as $key => $value)
                    <tr>
                        <form action="{{url('asignar_modificacion_analista')}}" method="post">
                        @csrf
                        <td>{{$key+1}}</td>
                        <td>{{$value->nombre_unidad}}</td>
                        <td style="width: 25%">{{$value->nombre_proyecto}}</td>
                        <td>{{$value->fondo}}</td>
                        <td align="right" style="width: 10%">{{number_format($value->monto_asignar_divisa,2,',','.')}}</td>
                        <td>{{number_format($value->tasa,2,',','.')}}</td>
                        <td align="right" style="width: 8%">{{number_format($value->monto_asignar_bs,2,',','.')}}</td>
                        <td style="width: 8%">{{$value->estatus}}</td>
                        <td style="width: 20%">
                            <select class="form-control" style="width: 100%" required name="id_analista">
                                <option value="" selected>- Seleccione -</option>
                                @foreach ($analista as $key1 => $value1)
                                    <option value="{{$value1->id}}">{{$value1->nombre}} {{$value1->apellido}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td align="center">
                            <input type="text" hidden="true" value="{{$value->id}}" name="id_modificacion">
                            <button type="submit" class="btn btn-circle btn-success">
                                <i class="fa fa-check"></i>
                            </button>
                        </td>
                        </form>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
            <!-- /.box-content -->
</div>

@endsection