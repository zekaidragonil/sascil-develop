@extends('principal')
@section('lista_solicitudes')

<div class="col-xs-12">
    <div class="box-content">
        <h4 class="box-title">Lista de Solicitudes de Contratación
        </h4>
        <table id="example" class="table table-striped table-bordered display" style="width:100%">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Unidad</th>
                    <th>N° Solicitud de Contratación</th>
                    <th>Fecha de Solicitud</th>
                    <th>Número Inicio de Proceso Asignado</th>
                    <th>Fecha de Asignación</th>
                    <th>Estatus</th>
                    <th>Ver</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>N°</th>
                    <th>Unidad</th>
                    <th>N° Solicitud de Contratación</th>
                    <th>Fecha de Solicitud</th>
                    <th>Número Inicio de Proceso Asignado </th>
                    <th>Fecha de Asignación</th>
                    <th>Estatus</th>
                    <th>Ver</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($lista_solicitudes as $key => $value)
                    <tr>
                    <form action="{{url('view_solicitud_verificada')}}" method="POST">
                        @csrf
                        <td><input type="text" hidden name="id_solicitud" value="{{$value->id}}">{{$value->id}}</td>
                        <td>{{$value->nombre}}</td>
                        <td>{{$value->numero_solicitud}}</td>
                        
                       
                        <td>{{date('d-m-Y / h:i:s a', strtotime($value->fecha_solicitud))}}</td>
                        <td>
                            @if ($value->numero_asignado!=null)
                                {{$value->numero_asignado}}
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            {{date('d-m-Y / h:i:s a', strtotime($value->fecha_procesado))}}
                        </td>
                        <td>
                            @if ($value->estatus=='No Recibido')
                                <label style="color:red;margin-bottom: 0px;">{{$value->estatus}}</label>
                            @endif
                            @if ($value->estatus=='Recibido')
                                <label style="color:green;margin-bottom: 0px;">{{$value->estatus}}</label>
                            @endif
                            @if ($value->estatus=='En espera')
                                <label  style="color:yellowgreen;margin-bottom: 0px;">{{$value->estatus}}</label>
                            @endif
                            @if ($value->estatus=='Asignado')
                                <label  style="color:blue;margin-bottom: 0px;">{{$value->estatus}}</label>
                        @endif
                        </td>
                        <td>
                            @if ($value->estatus!='En espera')
                                <button type="submit" class="btn btn-circle btn-info"><i class="fa fa-search"></i></button>    
                            @else
                                <button type="submit" disabled="true" class="btn btn-circle btn-default"><i class="fa fa-search"></i></button>
                            @endif
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