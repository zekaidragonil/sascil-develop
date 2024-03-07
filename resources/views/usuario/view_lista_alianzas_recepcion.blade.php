@extends('principal')
@section('lista_alianzas')
<div class="col-lg-12 col-xs-12">
    <div class="box-content">
        <h4 class="box-title">Solicitudes de Alianzas Asignadas</h4>
        <hr>
        <table id="example" class="table table-bordered">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>N° de Solicitud</th>
                    <th>N° Punto de Cuenta</th>
                    <th>Fecha Punto de Cuenta</th>
                    <th>Unidad Solicitante</th>
                    <th>Fecha de Solicitud</th>
                    <th>Fecha de Proceso (Recepción)</th>
                    <th>Estatus</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>N°</th>
                    <th>N° de Solicitud</th>
                    <th>N° Punto de Cuenta</th>
                    <th>Fecha Punto de Cuenta</th>
                    <th>Unidad Solicitante</th>
                    <th>Fecha de Solicitud</th>
                    <th>Fecha de Proceso (Recepción)</th>
                    <th>Estatus</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($lista_alianzas as $key => $value)
                    <tr>
                        <form action="{{url('asignar_alianza')}}" method="POST">
                            @csrf
                            
                            <td>{{$value->id}}</td>
                            <td>{{$value->solicitud_alianza}}</td>
                            <td>{{$value->numero_punto}}</td>
                            <td>{{date('d-m-Y h:i:s',strtotime($value->fecha_punto))}}</td>
                            <td>{{$value->nombre}}</td>
                            <td>
                                {{-- {{date('d-m-Y - h:m:s a',strtotime($value->fecha_solicitud))}} --}}
                                {{$value->fecha_solicitud}}
                            </td>
                            <td>
                                @if ($value->fecha_recibido!=null)
                                    {{$value->fecha_recibido}}
                                    {{-- {{date('d-m-Y - h:m:s a',strtotime($value->fecha_recibido))}} --}}
                                @else
                                    -
                                @endif
                                
                            </td>
                            <td>
                                @switch($value->estatus)
                                    @case('POR REVISION')
                                        <label style="color:chartreuse">{{$value->estatus}}</label>
                                        @break
                                    @case('Recibido')
                                        <label style="color:green">{{$value->estatus}}</label>
                                        @break
                                    @case('No Recibido')
                                        <label style="color:red">{{$value->estatus}}</label>
                                        @break
                                    @case('Asignada')
                                        <label style="color:blue">{{$value->estatus}}</label>
                                        @break
                                    @case('Aceptado')
                                        <label style="color:chartreuse">{{$value->estatus}}</label>
                                        @break
                                    @default
                                        <label>En Proceso</label>
                                        @break
                                @endswitch
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