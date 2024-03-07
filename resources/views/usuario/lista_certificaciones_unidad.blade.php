@extends('principal')
@section('lista_certificaciones_unidad')
<!-- /.col-xs-12 -->
<div class="col-xs-12">
	<div class="box-content">
		<h4 class="box-title">Solicitudes de Certificación Presupuestaria</h4>
		<!-- /.box-title -->
		<!-- /.dropdown js__dropdown -->
		<table id="example" class="table table-striped table-bordered display" style="width:100%">
			<thead>
				<tr>
					<th>Código de la Solicitud</th>
					<th>Fecha de Emisión</th>
					<th>Fecha de Envío</th>
					<th>Fecha de Respuesta</th>
				
					{{-- <th>Proyecto Presupuestario</th>
					<th>Nombre del Proyecto</th>
					<th>Fondo Presupuestario</th> --}}
					{{-- <th>Pre-Comprometido</th>
                    <th>Comprometido</th>
                    <th>Causado</th>
                    <th>Monto Disponible</th> --}}
                    <th>Estatus</th>
					@if (count($consulta)>0)
						@if ($consulta[0]->estatus=='Aprobado')
							<th>Ver</th>
						@endif
						@if ($consulta[0]->estatus=='Rechazado')
							<th>Ver</th>
						@endif
						@if ($consulta[0]->estatus=='En Transito')
							<th>Ver</th>
						@endif
						@if ($consulta[0]->estatus=='Revisado')
							<th>Ver</th>
						@endif
						@if ($consulta[0]->estatus=='Guardado')
							<th>Editar</th>
						@endif
					@endif
					@if (count($consulta)>0)
						<th>Observaciones</th>
					@endif	
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>Código de la Solicitud</th>
					<th>Fecha de Emisión</th>
					<th>Fecha de Envío</th>
					<th>Fecha de Respuesta</th>
				
					{{-- <th>Proyecto Presupuestario</th>
					<th>Nombre del Proyecto</th>
					<th>Fondo Presupuestario</th> --}}
					{{-- <th>Pre-Comprometido</th>
                    <th>Comprometido</th>
                    <th>Causado</th>
                    <th>Monto Disponible</th> --}}
                    <th>Estatus</th>
					@if (count($consulta)>0)
						@if ($consulta[0]->estatus=='Aprobado')
							<th>Ver</th>
						@endif
						@if ($consulta[0]->estatus=='Rechazado')
							<th>Ver</th>
						@endif
						@if ($consulta[0]->estatus=='En Transito')
							<th>Ver</th>
						@endif
						@if ($consulta[0]->estatus=='Revisado')
							<th>Ver</th>
						@endif
						@if ($consulta[0]->estatus=='Guardado')
							<th>Editar</th>
						@endif
					@endif
					@if (count($consulta)>0)
						<th>Observaciones</th>
					@endif	
				</tr>
			</tfoot>
			<tbody>
				@foreach ($consulta as $key => $value)
				<tr>
					<td>{{$value->nombre_solicitud}}</td>

					<td>{{date('d-m-Y H:i:s a',strtotime($value->fecha_generacion))}}</td>
					<td>
						@if ($value->fecha_solicitud!=null)
							{{date('d-m-Y H:i:s a',strtotime($value->fecha_solicitud))}}
						@else
							-	
						@endif
						
					</td>
					<td>
						@if ($value->fecha_certificado!=null)
							{{date('d-m-Y H:i:s a', strtotime($value->fecha_certificado))}}
						@else
							-
						@endif
					</td>
                    <td>
						@if($value->estatus=='Aprobado')
							<label for="Estatus" style="color:green">{{$value->estatus}}</label>
						@endif
                        @if($value->estatus=='En Transito')
                            <label for="Estatus" style="color:steelblue"></label>Enviado a Presupuesto
                        @endif
						@if($value->estatus=='Revisado')
                            <label for="Estatus" style="color:steelblue"></label>Revisado
                        @endif
                        @if($value->estatus=='Rechazado')
                        	<label for="Estatus" style="color:rgb(128, 0, 0)">{{$value->estatus}}</label>
						@endif
						@if($value->estatus=='Reversado')
                        	<label for="Estatus" style="color:rgb(202, 195, 0)">{{$value->estatus}}</label>
						@endif
						@if($value->estatus=='Guardado')
                        	<label for="Estatus" style="color:rgb(84, 218, 144)">{{$value->estatus}}</label>
						@endif
                    </td>
						@if ($value->estatus=='En Espera')
						<td>
							<form action="{{url('modificar_certificacion')}}" method="post">
							@csrf
								<input type="text"  hidden="true" name="id_certificacion_presupuestaria" value="{{$value->id}}">
								<button type="submit" disabled title="boton desabilitado" class="btn btn-circle btn-default"><i class="icon-edit-3"></i></button>
							</form>
						</td>
						@else
					
						@if($value->estatus=='Rechazado')
						<td>
							<a href="{{$value->adjunto}}" target="_blank" class="btn btn-circle btn-info"><i class="icon-search"></i></a>
						</td>
						@endif
						@if ($value->estatus=='En Transito')
							<td>
								<a href="{{$value->adjunto}}" target="_blank" class="btn btn-circle btn-info"><i class="icon-search"></i></a>
							</td>
						@endif
						@if ($value->estatus=='Revisado')
							<td>
								<a href="{{$value->adjunto}}" target="_blank" class="btn btn-circle btn-info"><i class="icon-search"></i></a>
							</td>
						@endif
						@if ($value->estatus=='Guardado')
							<td>
								<form action="{{url('modificar_certificacion')}}" method="post">
								@csrf
									<input type="text" hidden  name="id_certificacion_presupuestaria" value="{{$value->id}}">
									<button type="submit" class="btn btn-circle btn-info"><i class="icon-edit-3"></i></button>
								</form> 
								{{-- <a href="{{$value->adjunto}}" target="_blank" class="btn btn-circle btn-info"><i class="icon-search"></i></a> --}}
							</td>
						@endif
						@if ($value->estatus=='Enviado')
							<td>
								<a href="{{$value->adjunto}}" target="_blank" class="btn btn-circle btn-info"><i class="icon-search"></i></a>
							</td>
						@endif
						@if ($value->estatus=='Aprobado')
							<td>
								<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.1.min.js"></script>
								<a onclick="javascript: window.open('{{$value->adjunto2}}','_blank'); window.open('{{$value->adjunto}}','_blank');" class="btn btn-circle btn-info"><i class="icon-search"></i></a>
							</td>
						@endif
						<td>{{$value->observaciones2}}</td>
					@endif
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<!-- /.box-content -->
</div>
<!-- /.col-xs-12 -->

<script type="text/javascript">
function abrirEnlaces(url1,url2){
  window.open(url1);
  window.open(url2);
}
</script>
@endsection
