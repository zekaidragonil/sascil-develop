@extends('principal')
@section('lista_solicitud_procura')
<!-- /.col-xs-12 -->
<div class="col-xs-12">
	<div class="box-content">
		<h4 class="box-title">Lista de Solicitudes Inicio de Contrataciones</h4>
		<!-- /.box-title -->
		<!-- /.dropdown js__dropdown -->
		<table id="example-scroll-y" class="table table-striped table-bordered display" style="width:100%">
			<thead>
				<tr>
					<th>N°</th>
					<th>N° de Solicitud</th>
					<th>Fecha Solicitud</th>
					<th>Número Inicio de Proceso Asignado</th>
					<th>Estatus</th>
                    <th style="text-align: center">Verificar</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>N°</th>
					<th>N° de Solicitud</th>
					<th>Fecha Solicitud</th>
					<th>Número Inicio de Proceso Asignado</th>
					<th>Estatus</th>
                    <th style="text-align: center">Verificar</th>
				</tr>
			</tfoot>
			<tbody>
				@foreach ($solicitudes as $key => $value)
				<tr>
				<form action="{{url('verificar_solicitud')}}" method="POST">
					@csrf
					<td>{{$value->correlativo_unidad}}</td>
					<td>{{$value->numero_solicitud}}</td>
					<td>{{$value->fecha}}</td>
					<td>@if ($value->numero_asignado!=null)
						{{$value->numero_asignado}}
					@else
						-
					@endif
						
					</td>
					<td>
						@if ($value->estatus=='Recibido')
							<label style="color:green">{{$value->estatus}}</label>
						@endif
						@if ($value->estatus=='No Recibido')
							<label style="color:red">{{$value->estatus}}</label>
						@endif
						@if ($value->estatus=='POR REVISION')
							<label style="color:yellowgreen">{{$value->estatus}}</label>
						@endif
						@if ($value->estatus=='Asignado')
							<label style="color:blue">{{$value->estatus}}</label>
						@endif
						@switch($value->estatus)
							@case('FORMACIÓN')
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
							@case($value->estatus=='REVISION')
								<label style="color:yellowgreen">{{$value->estatus}}</label>
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
						<input type="text" name="id_solicitud" hidden value="{{$value->id}}">
						<button type="submit" class="btn btn-success btn-circle waves-effect waves-light" type="button"><i class="fa fa-search"></i></button>
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
