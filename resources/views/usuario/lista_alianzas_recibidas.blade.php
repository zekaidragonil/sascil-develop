@extends('principal')
@section('alianzas_recibidas')

<div class="col-xs-12">
    <div class="box-content">
        <h4 class="box-title">Asignar Alianzas Recibidas</h4>
        <table id="example" class="table table-striped table-bordered display" style="width:100%">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>N° Solicitud de Alianza</th>
                    <th>Unidad Solicitante</th>
                    <th>Fecha de Solicitud</th>
                    <th style="width: 25%">N° de Inicio de Proceso Asignado</th>
                    <th>Fecha de Asignación</th>
                    <th>Estatus</th>
                    <th>Ver</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>N°</th>
                    <th>N° Solicitud de Alianza</th>
                    <th>Unidad Solicitante</th>
                    <th>Fecha de Solicitud</th>
                    <th>N° de Inicio de Proceso Asignado</th>
                    <th>Fecha de Asignación</th>
                    <th>Estatus</th>
                    <th>Ver</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($alianza as $key => $value)
                <tr>
                    <form action="{{url('asignar_numero_alianza')}}" method="post">
                        @csrf
                    <td>{{$value->id}}
                        <input type="text" hidden name="id_alianza" value="{{$value->id}}"></td>
                    <td>{{$value->solicitud_alianza}}</td>
                    <td>{{$value->nombre}}</td>
                    <td>
                        {{-- {{$value->fecha_solicitud}} --}}
                        {{date('d-m-Y H:i:s', strtotime($value->fecha_solicitud))}}
                    </td>
                    <td>
                        @if ($value->numero_alianza!=null)
                            {{$value->numero_alianza}}
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        @if ($value->fecha_numeracion!=null)
                            {{-- {{$value->fecha_numeracion}} --}}
                            {{date('d-m-Y H:i:s',strtotime($value->fecha_numeracion))}}
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        @switch($value->estatus)
                            @case('Recibido')
                                <label style="color:green">{{$value->estatus}}</label>
                                @break
                            @case('Asignada')
                                <label style="color:blue">{{$value->estatus}}</label>
                                @break
                            @case('No Recibido')
                                <label style="color:rgb(255, 0, 0)">{{$value->estatus}}</label>
                                @break
                            @case('Aceptado')
                                <label style="color:chartreuse)">{{$value->estatus}}</label>
                                @break
                            @case('POR REVISION')
                                <label style="color:yellowgreen">{{$value->estatus}}</label>
                                @break
                            @default
                            <label>En Proceso</label>
                                @break
                                
                        @endswitch
                       
                    </td>
                    <td>
                        @if ($value->numero_alianza!=null)
                            <button type="submit"  class="btn btn-info btn-circle light-effect"><i class="fa fa-search"></i></button>
                        @else
                            <button type="submit" disabled class="btn btn-default btn-circle light-effect"><i class="fa fa-search"></i></button>
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