@extends('principal')
@section('lista_traspaso_asignado')
<div class="col-xs-12">
	<div class="box-content">
		<h4 class="box-title">Lista de Solicitudes de Traspaso Asignadas</h4>
		<!-- /.box-title -->
		<!-- /.dropdown js__dropdown -->
		<table id="example" class="table table-striped table-bordered display" style="width:100%">
			<thead>
				<tr>
					<th>N°</th>
					<th>Unidad</th>
					<th>Nombre Analista</th>
					<th>Fecha de Asignación</th>
					<th>Fecha de Respuesta</th>
                    <th>Estatus</th>
					<th>
						<center>Ver</center>
					</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
                    <th>N°</th>
					<th>Unidad</th>
					<th>Nombre Analista</th>
					<th>Fecha de Asignación</th>
					<th>Fecha de Respuesta</th>
                    <th>Estatus</th>
					<th>
						<center>Ver</center>
					</th>
				</tr>
			</tfoot>
			<tbody>
				@foreach ($lista as $key => $value) 
				<tr>
                    <td>{{$key+1}}</td>
					<td>{{$value->nombre_unidad}}</td>
					<td>{{$value->nombre}} {{$value->apellido}}</td>
					<td>{{$value->fecha_asignada}}</td>
					<td>
                        @if ($value->fecha_respuesta!=null)
                            {{$value->fecha_respuesta}}
                        @else
                            -
                        @endif
                    </td>
					<td>
                        {{$value->estatus}}
                    </td>
					<td align="center">
						<a href="" onclick="javascript:window.open('{{$value->memorandum_traspaso}}', '_blank'); window.open('{{$value->solicitud_credito_presupuestario}}', '_blank');" class="btn btn-info btn-small btn-circle"><i class="fa fa-search"></i></a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<!-- /.box-content -->
</div>
@endsection