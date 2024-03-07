@extends('principal')
@section('lista_rev_certificacion')
<!-- /.col-xs-12 -->
<div class="col-xs-12">
	<div class="box-content">
		<h4 class="box-title">Solicitudes de Certificación Presupuestaria</h4>
		<!-- /.box-title -->
		<!-- /.dropdown js__dropdown -->
		<table id="example" class="table table-striped table-bordered display" style="width:100%">
			<thead>
				<th>Código de Certifiación</th>
					<th>Fecha de Emisión</th>
					<th>Fecha de Envío</th>
					<th>Fecha Respuesta</th>
                    <th>Estatus</th>
                    <th>Reversar</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>Código de Certifiación</th>
					<th>Fecha de Emisión</th>
					<th>Fecha de Envío</th>
					<th>Fecha Respuesta</th>
                    <th>Estatus</th>
                    <th>Reversar</th>
				</tr>
			</tfoot>
			<tbody>
				@foreach ($consulta as $key => $value)
				<tr>
					<form action="{{url('reversar_certificacion')}}" method="POST">
						@csrf
						<td>{{$value->nombre_solicitud}}</td>
						<td>{{$value->fecha_generacion}}</td>
						<td>
							@if ($value->fecha_solicitud!=null)
								{{$value->fecha_solicitud}}
							@else
								-
							@endif
							
						</td>
						<td>{{$value->fecha_certificado}}</td>
						<td>
							{{$value->estatus}}
						</td>
						<td align="center">
							<input type="text" name="id" value="{{$value->id}}" hidden >
							<button type="submit" class="btn btn-danger btn-circle btn-xs waves-effect waves-ligth"><i class="ico icon-minus-4"></i>
							</button>
						</td>
					</form>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<!-- /.box-content -->
</div>
			<!-- /.col-xs-12 -->
@endsection
