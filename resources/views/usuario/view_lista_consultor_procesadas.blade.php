@extends('principal')
@section('view_lista_solicitudes_consultor_procesadas')
<div class="col-xs-12">
    <div class="box-content">
        <h4 class="box-title">Lista de solicitudes Procesadas, Consultor: {{$usuario[0]->nombre}} {{$usuario[0]->apellido}}</h4>
        <table id="example" class="table table-striped table-bordered display" style="width:100%">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>N° de Solicitud</th>
                    <th>N° de Inicio de Proceso</th>
                    <th>Unidad Solicitante</th>
                    <th>Fecha Solicitud</th>
                    <th>Fecha Asignado</th>
                    <th>Fecha Respuesta</th>
                    <th>Estatus en Procura</th>
                    <th>Ver</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>N°</th>
                    <th>N° de Solicitud</th>
                    <th>N° de Inicio de Proceso</th>
                    <th>Unidad Solicitante</th>
                    <th>Fecha Solicitud</th>
                    <th>Fecha Asignado</th>
                    <th>Fecha Respuesta</th>
                    <th>Estatus en Procura</th>
                    <th>Ver</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($lista as $key => $value)
                    <tr>
                        <form action="{{url('view_verificar_solicitud_consultor')}}" method="post">
                        @csrf
                        
                        <td>{{$value->id}}</td>
                        <td>{{$value->numero_solicitud}}</td>
                        <td>{{$value->numero_asignado}}</td>
                        <td>{{$value->nombre}}</td>
                        <td>{{date('d-m-Y h:i:s',strtotime($value->fecha_solicitud))}}</td>
                        <td>{{date('d-m-Y h:i:s',strtotime($value->fecha_asignado))}}</td>
                        <td>
                            @if ($value->fecha_respuesta==null)
                                -
                            @else
                                {{date('d-m-Y h:i:s',strtotime($value->fecha_respuesta))}}
                            @endif
                                
                        </td>
                        <td>
                            @if ($value->nombre_estatus==null)
                                -
                            @else
                                {{$value->nombre_estatus}}
                            @endif
                                
                        </td>
                        <td>
                            <input name="id_solicitud" hidden="true" value="{{$value->id}}" type="text">
                            <button type="submit" class="btn btn-info btn-circle"><i class = 'fa fa-search'></i></button>
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