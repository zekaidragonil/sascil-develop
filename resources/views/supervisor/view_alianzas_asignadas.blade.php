@extends('principal')
@section('alianzas_asignadas')

<div class="row small-spacing">
    <div class="col-xs-12">
        <div class="box-content">
            <h4 class="box-title">Lista de Alianzas Asignadas</h4>
            <!-- /.dropdown js__dropdown -->
            <table id="example" class="table table-striped table-bordered display" style="width:100%">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>N° Alianza</th>
                        <th>Asignado</th>
                        <th>Fecha de Asignación</th>
                        <th>Fecha de Respuesta</th>
                        <th>Estatus</th>
                        <th>Ver</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>N°</th>
                        <th>N° Alianza</th>
                        <th>Asignado</th>
                        <th>Fecha de Asignación</th>
                        <th>Fecha de Respuesta</th>
                        <th>Estatus</th>
                        <th>Ver</th>
                    </tr>
                </tfoot>
                @foreach ($lista as $key => $value)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$value->numero_alianza}}</td>
                        <td>{{$value->nombre}} {{$value->apellido}}</td>
                        <td>{{date('d-m-Y / h:i:s a',strtotime($value->fecha_asignado))}}</td>
                        <td>
                            @if ($value->fecha_respuesta==null)
                                -
                            @else
                                {{date('d-m-Y /h:i:s a',strtotime($value->fecha_respuesta))}}
                            @endif
                        </td>
                        <td>
                            @if ($value->estatus == 'Asignada')
                                <label for="" style="color: blue">{{$value->estatus}}</label>
                            @endif
                            @if ($value->estatus == 'Recibido')
                            <label for="" style="color: green">{{$value->estatus}}</label>
                            @endif
                            @switch($value->estatus)
                                @case('FORMACION')
                                    <label style="color:blue">{{$value->estatus}}</label>
                                @break
                                @case('LLAMADO')
                                    <label style="color:blue">{{$value->estatus}}</label>
                                @break
                                @case($value->estatus=='INVITADO')
                                    <label style="color:blue">{{$value->estatus}}</label>
                                @break
                                @case($value->estatus=='CURSO')
                                    <label style="color:blue">{{$value->estatus}}</label>
                                @break
                                @case($value->estatus=='ADJUDICADO')
                                    <label style="color:green">{{$value->estatus}}</label>
                                @break
                                @case($value->estatus=='CONTRATO FIRMADO')
                                    <label style="color:blue">{{$value->estatus}}</label>
                                @break	
                                @case($value->estatus=='PEDIDO CREADO (FA)')
                                    <label style="color:blue">{{$value->estatus}}</label>
                                @break
                                @case($value->estatus=='TERMINADO')
                                    <label style="color:orangered">{{$value->estatus}}</label>
                                @break
                                @case($value->estatus=='DEVUELTO')
                                    <label style="color:indigo">{{$value->estatus}}</label>
                                @break
                                @case($value->estatus=='DESIERTO')
                                    <label style="color:red">{{$value->estatus}}</label>
                                @break
                            @endswitch
                        </td>
                        <td>
                            <form action="consultar_alianza_asignada_consultor" method="post">
                                @csrf
                                <input type="text" name="id_alianza" hidden value="{{$value->id}}">
                                <button type="submit" class="btn btn-xs btn-circle btn-info"> <i class="fa fa-search"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.box-content -->
    </div>
</div>

@endsection