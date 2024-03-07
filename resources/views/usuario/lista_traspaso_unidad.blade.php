@extends('principal')
@section('lista_traspaso_unidad')
<!-- /.col-xs-12 -->
<div class="col-xs-12">
	<div class="box-content">
		<h3 class="box-title">Lista de Solicitudes de Solicitudes de Traspaso</h3>
		<!-- /.box-title -->
		<!-- /.dropdown js__dropdown -->
		<table id="example" class="table table-striped table-bordered display" style="width:100%">
			<thead>
				<tr>
					<th style="width: 5%"><center>N°</center></th>
					<th style="width: 15%">N° Solicitud</th>
                    <th style="width: 60%">Concepto</th>
					<th>Estatus</th>
					<th style="width: 10%">
						<center>
							Ver
							<img src="assets/images/slash.png" width="15%" alt="">
							Enviar
						</center>
					</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th style="width: 5%"><center>N°</center></th>
					<th style="width: 15%">N° Solicitud</th>
                    <th style="width: 60%">Concepto</th>
					<th>Estatus</th>
					<th style="width: 10%">
						<center>
						Ver
						<img src="assets/images/slash.png" width="15%" alt="">
						Enviar
						</center>
					</th>
				</tr>
			</tfoot>
			<tbody>
				@foreach ($lista as $key => $value)
					<tr>
						<form action="{{url('solicitud_proceso')}}" method="post">
							@csrf
							<td align="center">{{$key+1}} <input value="{{$value->id}}" name="id_traspaso" type="text" hidden></td>
							<td>{{$value->solicitud_traspaso}} <input name="solicitud_traspaso" value="{{$value->solicitud_traspaso}}" type="text" hidden></td>
							<td>{{$value->concepto}}</td>
							<td>
								@switch($value->estatus)
									@case('Rechazada')
										<label style="color: red">{{$value->estatus}}</label>
										@break
									@case('Aprobado')
										<label style="color: green">{{$value->estatus}}</label>
										@break
									@case('Asignado')
										<label style="color:deepskyblue">{{$value->estatus}}</label>
										@break
									@case('Enviado')
										<label style="color:rgb(55, 191, 100)">{{$value->estatus}}</label>
										@break
									@case('Por Enviar')
										<label style="color:blue">{{$value->estatus}}</label>
										@break
									@case('En Espera')
										<label style="color:rgb(129, 159, 21)">{{$value->estatus}}</label>
										@break
								@endswitch
							</td>
							<td align="center">
								<button class="btn btn-circle btn-info" title="ver solicitud de traspaso presupuestario" type="submit"><i class="fa fa-search"></i></button>
								<img src="assets/images/slash.png" width="15%" alt="">
								@if ($value->estatus != 'Por Enviar') 
									<button type="submit" disabled name="adjuntar" value="1" class="btn btn-circle btn-default"><i class="fa fa-upload"></i></button>
								@else
									<button type="submit" name="adjuntar" title="Cargar documentos para completar la solicitud de traspaso presupuestario" value="1" class="btn btn-circle btn-violet"><i class="fa fa-upload"></i></button>
								@endif
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
