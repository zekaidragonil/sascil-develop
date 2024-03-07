@extends('principal')
@section('consulta_alianza_consultor')

<div class="col-xs-12">
    <div class="box-content">
        <h4 class="box-title">Lista de Alianzas a Analizar</h4>
        <!-- /.dropdown js__dropdown -->
        <table id="example" class="table table-striped table-bordered display" style="width:100%">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>N° de Alianza</th>
                    <th>Unidad Solicitante</th>
                    <th>Fecha de Solicitud</th>
                    <th>Estatus</th>
                    <th>Analiszar</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>N°</th>
                    <th>N° de Alianza</th>
                    <th>Unidad Solicitante</th>
                    <th>Fecha de Solicitud</th>
                    <th>Estatus</th>
                    <th>Analiszar</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($analizar as $key => $value)
                    <tr>
                        <form action="{{url('analizar_alianza_consultor')}}" method="POST">
                            @csrf
                        <td>
                            <input type="text" name="id_alianza" hidden value="{{$value->id}}">
                            {{$key+1}}
                        </td>
                        <td>{{$value->numero_alianza}}</td>
                        <td>{{$value->nombre}}</td>
                        <td>{{$value->fecha_creacion}}</td>
                        <td>
                            <input type="text" hidden name="estatus" value="{{$value->estatus}}">
                            @if ($value->estatus == 'Asignada')
                                <label for="" style="color: blue">{{$value->estatus}}</label>
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
                        <td align="center">
                            @switch($value->estatus)
                                @case('ADJUDICADO')
                                    <button type="submit" class="btn btn-circle btn-info"><i class="fa fa-search"></i>
                                    </button>
                                    @break
                                @case('TERMINADO')
                                    <button type="submit" class="btn btn-circle btn-danger"><i class="fa fa-search"></i>
                                    </button>
                                    @break
                                @case('DEVUELTO')
                                    <button type="submit" class="btn btn-circle btn-danger"><i class="fa fa-search"></i>
                                    </button>
                                    @break
                                @case('DESIERTO')
                                    <button type="submit" class="btn btn-circle btn-danger"><i class="fa fa-search"></i>
                                    </button>
                                    @break
                                @default
                                    <button type="submit" class="btn btn-circle btn-success"><i class="fa fa-search"></i>
                                    </button>
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