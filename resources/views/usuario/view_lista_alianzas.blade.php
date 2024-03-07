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
                    <th>Fecha de Solicitud</th>
                    <th>Unidad Solicitante</th>
                    {{-- <th>N° Inicio de Proceso Asignado P/Procura</th> --}}
                    <th>Estatus</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>N°</th>
                    <th>N° de Solicitud</th>
                    <th>N° Punto de Cuenta</th>
                    <th>Fecha Punto de Cuenta</th>
                    <th>Fecha de Solicitud</th>
                    <th>Unidad Solicitante</th>
                    {{-- <th>N° Inicio de Proceso Asignado P/Procura</th> --}}
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
                            <td>{{$value->fecha_punto}}</td>
                            <td>
                                {{date('d-m-Y - h:m:s a',strtotime($value->fecha_solicitud))}}
                            </td>
                            <td>{{$value->nombre}}</td>
                            {{-- <td>
                                <input type="text" hidden name="id_alianza" value="{{$value->id}}">
                                @if ($value->numero_alianza!=null)
                                    {{$value->numero_alianza}}
                                @else
                                    -
                                @endif
                                
                            </td> --}}
                            <td>
                                @if ($value->estatus=='En Transito')
                                    <label style="color:yellowgreen">{{$value->estatus}}</label>
                                @endif
                                @if ($value->estatus=='Recibido')
                                    <label style="color:green">{{$value->estatus}}</label>
                                @endif
                                @if ($value->estatus=='No Recibido')
                                    <label style="color:red">{{$value->estatus}}</label>
                                @endif
                                {{-- @if ($value->estatus=='Asignada')
                                <label style="color:blue">{{$value->estatus}}</label>
                                @endif --}}
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