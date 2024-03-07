@extends('principal')
@section('lista_solicitudes')

<div class="col-xs-12">
    <div class="box-content">
        <h4 class="box-title">Lista de Solicitudes de Contratación</h4>
        <table id="example" class="table table-striped table-bordered display" style="width:100%">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>N° Solicitud de Contratación</th>
                    <th>Unidad</th>
                    <th>Fecha de Solicitud</th>
                    <th>Fecha de Proceso (Recepción)</th>
                    <th>Estatus</th>
                    <th>Ver</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>N°</th>
                    <th>N° Solicitud de Contratación</th>
                    <th>Unidad</th>
                    <th>Fecha de Solicitud</th>
                    <th>Fecha de Proceso (Recepción)</th>
                    <th>Estatus</th>
                    <th>Ver</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($lista_solicitudes as $key => $value)
                @if( $value->estatus=='No Recibido' || $value->estatus=='Recibido' || $value->estatus=='POR REVISION' || $value->estatus=='Asignado')
                    <tr>
                    <form action="{{url('view_solicitud')}}" method="POST">
                        @csrf
                        <td><input type="text" hidden name="id_solicitud" value="{{$value->id}}">{{$value->id}}</td>
                        <td>{{$value->numero_solicitud}}</td>
                        <td>{{$value->nombre}}</td>
                        <td>{{date('d-m-Y / H:i:s a', strtotime($value->fecha_solicitud))}}</td>
                        <td>
                            @if ($value->fecha_recepcion!=null)
                                {{date('d-m-Y / H:i:s a', strtotime($value->fecha_recepcion))}}
                            @else
                            -
                            @endif
                           
                        </td>
                        <td>
                            @if ($value->estatus=='No Recibido')
                                <label style="color:red">{{$value->estatus}}</label>
                            @endif
                            @if ($value->estatus=='Recibido')
                                <label style="color:green">{{$value->estatus}}</label>
                            @endif
                            @if ($value->estatus=='POR REVISION')
                                <label  style="color:yellowgreen">{{$value->estatus}}</label>
                            @endif
                            @if ($value->estatus=='Asignado')
                                <label  style="color:blue">{{$value->estatus}}</label>

                        @endif
                        </td>
                        <td>
                            @if ($value->estatus!='POR REVISION')
                                <button type="submit" class="btn btn-circle btn-info"><i class="fa fa-search"></i></button>    
                            @else
                                <button type="submit" disabled="true" class="btn btn-circle btn-default"><i class="fa fa-search"></i></button>
                            @endif
                        </td>
                    </form>
                    </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.box-content -->
</div>

    
@endsection