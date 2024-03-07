@extends('principal')
@section('modificacion_presupuestaria_consulta')
<div class="col-lg-12 col-xs-12">
	<div class="box-content card white">
		<h4 class="box-title">Modificaciones Presupuestarias</h4>
		<!-- /.box-title -->
		<div class="card-content" >
            </div>
                <div class="col-xs-12">
                    <div class="box-content">
                        <h4 class="box-title">Lista de Modificaciones Presupuestarias</h4>
                        <!-- /.dropdown js__dropdown -->
                        <br>
                        <table id="example" class="table table-striped table-bordered display">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Nombre del Proyecto</th>
                                    <th style="width: 10%">Area Funcional</th>
                                    <th style="width: 10%">Fondo</th>
                                    <th style="width: 12%">Punto de Cuenta</th>
                                    <th style="width: 10%">Moneda</th>
                                    <th style="width: 12%">Monto Divisa</th>
                                    <th style="width: 12%">Monto Bs</th>
                                    <th style="width: 10%">Estatus</th>
                                    <th>Ver</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>N°</th>
                                    <th>Nombre del Proyecto</th>
                                    <th style="width: 10%">Area Funcional</th>
                                    <th style="width: 10%">Fondo</th>
                                    <th style="width: 12%">Punto de Cuenta</th>
                                    <th style="width: 10%">Moneda</th>
                                    <th style="width: 12%">Monto Divisa</th>
                                    <th style="width: 12%">Monto Bs</th>
                                    <th style="width: 10%">Estatus</th>
                                    <th>Ver</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($lista as $key=>$value)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>
                                        <label style="margin-top: 12px;">
                                            {{$value->nombre_proyecto}}<input hidden name="id" value="{{$value->id}}">
                                        </label>
                                    </td>
                                    <td>
                                        <label style="margin-top: 12px;">
                                            {{$value->proyecto_presupuestario}}
                                        </label>
                                    </td>
                                    <td>
                                        <label style="margin-top: 12px;" >
                                            {{$value->fondo}}
                                        </label>
                                    </td>
                                    <td>
                                        <label style="margin-top: 12px;">
                                            <a href="{{$value->punto_cuenta_adjudicacion}}" target="_blanck">{{$value->punto_cuenta}}</a>
                                        </label>
                                    </td>
                                    <td align="left">
                                        <label style="margin-top: 12px;">
                                            {{$value->tipo_moneda}}
                                        </label>
                                    </td>
                                    <td align="right">
                                        <label style="margin-top: 12px;">
                                            {{number_format($value->monto_asignar_divisa,2,',','.')}}
                                        </label>
                                    </td>
                                    <td align="right">
                                        <label style="margin-top: 12px;">
                                            {{number_format($value->monto_asignar_bs,2,',','.')}}
                                        </label>
                                    </td>
                                    <td>
                                        @switch($value->estatus)
                                            @case('Aprobado')
                                                <label style="margin-top: 12px; color:green">{{$value->estatus}}</label>
                                                @break
                                            @case('Rechazado')
                                                <label style="margin-top: 12px; color:red">{{$value->estatus}}</label>
                                                @break
                                            @case('En Transito')
                                                <label style="margin-top: 12px; color:blue">{{$value->estatus}}</label>
                                                @break
                                        @endswitch
                                    </td>
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