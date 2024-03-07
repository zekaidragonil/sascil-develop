@extends('principal')
@section('consultar_alianza')
<div class="col-lg-12 col-xs-12">
	<div class="box-content card white">
		<h4 class="box-title">Lista de Solicitudes de Alianzas</h4>
		<!-- /.box-title -->
		<div class="card-content" >
            </div>
                <div class="col-xs-12">
                    <div class="box-content">
                        <!-- /.dropdown js__dropdown -->
                        <br>
                        <table id="example" class="table table-striped table-bordered display">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>N° Solicitud de Alianza</th>
                                    <th>Fecha de Solicitud</th>
                                    <th>Fecha Punto de Cuenta</th>
                                    <th>N° Punto de Cuenta</th>
                                    <th>N° de Inicio Proceso Asignado P/Procura</th>
                                    <th>Estatus</th>
                                    <th>Ver</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>N°</th>
                                    <th>N° Solicitud de Alianza</th>
                                    <th>Fecha de Solicitud</th>
                                    <th>Fecha Punto de cuenta</th>
                                    <th>N° Punto de Cuenta</th>
                                    <th>N° de Inicio Proceso Asignado P/Procura</th>
                                    <th>Estatus</th>
                                    <th>Ver</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($consulta as $key=>$value)
                                <tr>
                                    <form action="{{url('consulta_dcumentacion_aliaza_unidad')}}" method="POST">
                                        @csrf
                                    <td>
                                        <label style="margin-top: 12px;"><input type="text" hidden value="{{$value->id}}" name="id_alianza"> {{$value->correlativo_unidad}}</label>
                                    </td>
                                    <td>
                                        <label style="margin-top: 12px;">{{$value->solicitud_alianza}}</label>
                                    </td>
                                    <td>
                                        <label style="margin-top: 12px;">{{date('d-m-Y h:i:s',strtotime($value->fecha_solicitud))}}</label>
                                    </td>
                                    <td>
                                        <label style="margin-top: 12px;">{{date('d-m-Y h:i:s',strtotime($value->fecha_punto))}}</label>
                                    </td>
                                    <td>
                                        <label style="margin-top: 12px;">{{$value->numero_punto}}</label>
                                    </td>
                                    <td>
                                        @if ($value->numero_alianza!=null)
                                        <label style="margin-top: 12px;">
                                            {{$value->numero_alianza}}
                                        </label>
                                        @else
                                            -
                                        @endif
                                        
                                    </td>
                                    
                                    <td>
                                        @if ($value->estatus=='Aprobada')
                                            <label style="margin-top: 12px; color:green">
                                                {{$value->estatus}}
                                            </label>
                                        @endif
                                        @if($value->estatus=='POR REVISION')
                                            <label style="margin-top: 12px; color:rgb(209, 196, 22)">
                                                {{$value->estatus}}
                                            </label>
                                        @endif
                                        @if ($value->estatus=='Recibido')
                                            <label style="margin-top: 12px; color:lime">
                                                {{$value->estatus}}
                                            </label>
                                        @endif
                                        @if ($value->estatus=='No Recibido')
                                            <label style="margin-top: 12px; color:red">
                                                {{$value->estatus}}
                                            </label>
                                        @endif
                                        @if ($value->estatus=='Asignada')
                                            <label style="margin-top: 12px; color:darkcyan">
                                                {{$value->estatus}}
                                            </label>
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
                                        <button type="submit" class="btn btn-circle btn-info"><i class="fa fa-search"></i></button>
                                        {{--consultar laos documentos de la alianza--}}
                                    </td>
                                </form>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
		</div>
		<!-- /.card-content -->
	</div>
	<!-- /.box-content -->
</div>
@endsection
