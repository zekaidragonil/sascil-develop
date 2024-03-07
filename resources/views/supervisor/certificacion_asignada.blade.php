@extends('principal')
@section('certificacion_presupuestaria_asignadas')
{{--actualizar formato para actualizar la certificacion presupuestaria--}}
<!-- /.col-xs-12 -->
<div class="col-xs-12">
	<div class="box-content">
		<h4 class="box-title">Certificaciones Presupuestarias Asignadas</h4>
		<!-- /.box-title -->
		<!-- /.dropdown js__dropdown -->
        <div  class="box-content table-responsive">
		<table id="example-scroll-y" class="table table-striped table-bordered display" style="width:100%">
			<thead>
				<tr>
					<th style="width: 15%" title="numero de la certifiación">N° Cert.</th>
					<th>Analista</th>
					<th>Fecha Asignado</th>
					<th>Fecha de Respuesta</th>
                    <th>Estatus</th>
					<th>Ver</th>
                </tr>
			</thead>
			<tfoot>
				<tr>
					<th style="width: 15%" title="numero de la certifiación">N° Cert.</th>
					<th>Analista</th>
					<th>Fecha Asignado</th>
					<th>Fecha de Respuesta</th>
                    <th>Estatus</th>
					<th>Ver</th>
                </tr>
			</tfoot>
			<tbody>
                @if($certificacion!=null)
				@foreach ($certificacion as $key => $value)
				<tr>		
					<td>{{$value->nombre_solicitud}}</td>
					<td>{{$value->nombre}} {{$value->apellido}}</td>
					<td>{{date('d-m-Y h:i:s',strtotime($value->fecha_asignado))}}</td>
					<td>
						@if ($value->fecha_respuesta!=null)
							{{date('d-m-Y h:i:s',strtotime($value->fecha_respuesta))}}
						@else
							-
						@endif
					</td>
					<td>
						@if($value->estatus=='Aprobado')
							<label style="color:green">{{$value->estatus}}</label>
						@endif
						@if($value->estatus=='En Transito')
							<label style="color:yellowgreen">{{$value->estatus}}</label>
						@endif
						@if($value->estatus=='Rechazado')
							<label style="color:red">{{$value->estatus}}</label>
						@endif
						@if ($value->estatus=='Revisado')
							<label style="color:orange">{{$value->estatus}}</label>
						@endif
						@if ($value->estatus=='Reversado')
							<label style="color:grey">{{$value->estatus}}</label>
						@endif
					</td>
					<td>
						@if ($value->estatus=='Aprobado')
							<a onclick="javascript:window.open('{{$value->adjunto}}', '_blank'); window.open('{{$value->adjunto2}}', '_blank');" class="btn btn-info btn-circle btn-sm">
							<i class="fa fa-search"></i></a>
						@else
							<a href="{{$value->adjunto}}" target="_black" class="btn btn-info btn-circle btn-sm">
								<i class="fa fa-search"></i></a>
						@endif
						
					</td>
				</tr>
				
                @endforeach
                @endif
			</tbody>
		</table>
        </div>
	</div>
	<!-- /.box-content -->
</div>
			<!-- /.col-xs-12 -->
@endsection