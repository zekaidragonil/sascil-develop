@extends('principal')
@section('view_lista_solicitudes_consultor')
<div class="col-xs-12">
    <div class="box-content">
        <h4 class="box-title">Lista de Solicitudes Asignadas al Consultor: {{$usuario[0]->nombre}} {{$usuario[0]->apellido}}</h4>
        <table id="example" class="table table-striped table-bordered display" style="width:100%">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Unidad Solicitante</th>
                    <th>N° de Solicitud</th>
                    <th>Fecha Solicitud</th>
                    <th>N° de Inicio de Proceso</th>
                    <th>Fecha Asignado</th>
                    <th>Fecha Respuesta</th>
                    <th>Estatus en Procura</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>N°</th>
                    <th>Unidad Solicitante</th>
                    <th>N° de Solicitud</th>
                    <th>Fecha Solicitud</th>
                    <th>N° de Inicio de Proceso</th>
                    <th>Fecha Asignado</th>
                    <th>Fecha Respuesta</th>
                    <th>Estatus en Procura</th>
                    <th>Editar</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($lista as $key => $value)
                    <tr>
                        <form action="{{url('view_analizar_solicitud_consultor')}}" method="post">
                        @csrf
                        
                        <td>{{$value->id}}</td>
                        <td>{{$value->nombre}}</td>
                        <td>{{$value->numero_solicitud}}</td>
                        <td>{{date('d-m-Y / h:i:s',strtotime($value->fecha_solicitud))}}</td>
                        <td>{{$value->numero_asignado}}</td>
                        <td>{{date('d-m-Y / h:i:s',strtotime($value->fecha_asignado))}}</td>
                        <td>
                            @if ($value->fecha_respuesta==null)
                                -
                            @endif
                                {{date('d-m-Y / h:i:s',strtotime($value->fecha_respuesta))}}
                        </td>
                        <td>
                            @if ($value->nombre_estatus==null)
                            -
                            @endif
                                {{$value->nombre_estatus}}
                        </td>
                        <td>
                            <input name="id_solicitud" hidden="true" value="{{$value->id}}" type="text">
                            <button type="submit" class="btn btn-success btn-circle"><i class = 'fa fa-edit'></i></button>
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