@extends('principal')
@section('revision')
<!-- /.col-xs-12 -->
<div class="col-xs-12">
	<div class="box-content">
		<h4 class="box-title">Lista de Certificación en Revisión</h4>
		<!-- /.box-title -->
		<!-- /.dropdown js__dropdown -->
		<table id="example-scroll-y" class="table table-striped table-bordered display" style="width:100%">
			<thead>
				<tr>
					<th>N° de Solicitud</th>
					<th>Fecha de Solicitud</th>
                    <th>Fecha Asignado</th>
					<th>Fecha de Respuesta</th>
                    <th>Estatus</th>
                    <th><center>Ver</center></th>
				</tr>
			</thead>
			<tfoot>
				<tr>
                    <th>N° de Solicitud</th>
					<th>Fecha de Solicitud</th>
                    <th>Fecha Asignado</th>
					<th>Fecha de Respuesta</th>
                    <th>Estatus</th>
                    <th><center>Ver</center></th>
				</tr>
			</tfoot>
			<tbody>
				@foreach ($revision as $key => $value)
				<tr>
					<td>
                        {{$value->nombre_solicitud}}
                    </td>
					<td>{{date('d-m-Y H:i:s',strtotime($value->fecha_solicitud))}}</td>
                    <td>{{date('d-m-Y H:i:s',strtotime($value->fecha_asignado))}}</td>
                    <td>
						@if($value->fecha_respuesta==null)
							-
						@else
							{{date('d-m-Y H:i:s' ,strtotime($value->fecha_respuesta))}}
						@endif
					</td>
					<td>{{$value->estatus}}</td>
					@if ($value->estatus=='En Transito')
					<td align="center">
						<form action="{{url('verificar_certificacion')}}" method="POST">
							@csrf
							<input hidden type="text" name="id_certificacion_presupuestaria" value="{{$value->id_certificacion_presupuestaria}}">
							<input hidden type="text" name="id_usuario" value="{{$value->id_usuario}}">
							<button type="submit" title="Verificar la documentación de la solicitud" class="btn btn-warning btn-circle waves-effect waves-light" type="button"><i class="fa fa-search"></i></button>
						</form>
					</td>
					@endif
					@if($value->estatus=='Revisado')
						<td align="center">
							<form action="{{url('actualizar_solicitud_certificado')}}" method="POST">
								@csrf
								<input hidden type="text" name="id_certificacion_presupuestaria" value="{{$value->id_certificacion_presupuestaria}}">
                        		<input hidden type="text" name="id_usuario" value="{{$value->id_usuario}}">
								<button type="submit" id="aprobar" name="aprobar" value=1 title="Para aprobar el proceso debe cargar la certificación con firma y sello humedo" class="btn btn-info btn-circle waves-effect waves-light" type="button"><i class="fa fa-upload"></i></button>
							</form>
						</td>
					@endif
					@if($value->estatus=='Aprobado')
					<td align="center">
						<a onclick="javascript:window.open('{{$value->adjunto}}', '_blank'); window.open('{{$value->adjunto2}}', '_blank');" class="btn btn-success btn-circle waves-effect waves-light" ><i class="fa fa-check"></i></a>
					</td>	
					@endif	
					@if($value->estatus=='Rechazado')
					<td align="center">
						<a target="_black" href="{{$value->adjunto}}" class="btn btn-danger btn-circle waves-effect waves-light"><i class="fa fa-close"></i></a>
					</td>
					@endif
					@if($value->estatus=='Reversado')
					<td align="center">
						<button disabled title="Certificación Rechazada" class="btn btn-info btn-circle waves-effect waves-light" type="button"><i class="fa fa-check"></i></button>
					</td>
					@endif			
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<!-- /.box-content -->
</div>
			<!-- /.col-xs-12 -->
@endsection
