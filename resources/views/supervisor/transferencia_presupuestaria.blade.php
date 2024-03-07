@extends('principal')
@section('lista_traspaso_unidad')
<!-- /.col-xs-12 -->
<div class="col-lg-12 col-xs-24 ">
	<div class="box-content">
		<h3 class="box-title">Lista de Solicitudes de Traspaso Presupuestario</h3>
		<!-- /.box-title -->
		<!-- /.dropdown js__dropdown -->
		<table id="example-scroll-y" class="table table-striped table-bordered display" style="width:10|0%">
			<thead>
				<tr>
					<th>N°</th>
					<th style="width: 10%">N° Solicitud</th>
                    <th style="width: 20%">Concepto</th>
					<th>Unidad Solicitante</th>
					<th>Estatus</th>
                    <th><center>Ver</center></th>
					<th style="width: 15%">Aprobar <img src="assets/images/slash.png" width="10%" alt=""/> Rechazar</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>N°</th>
					<th>N° Solicitud</th>
                    <th style="width: 20%">Concepto</th>
					<th>Unidad Solicitante</th>
					<th>Estatus</th>
                    <th><center>Ver</center></th>
					<th>Aprobar <img src="assets/images/slash.png" width="10%" alt=""> Rechazar</th>
				</tr>
			</tfoot>
			<tbody>
				@foreach ($lista as $key => $value)
				<tr>
                    <form action="{{url('proceso_traspaso')}}" method="POST">
                    @csrf
					<td>{{$key+1}}</td>
					<td>{{$value->solicitud_traspaso}}</td>
					<td>{{$value->concepto}} <input type="text" hidden name="id" value="{{$value->id}}"><input hidden type="text" name='id_unidad' value="{{$value->id_unidad}}"> </td>
					<td>{{$value->nombre}}</td>
					<td>
						@switch($value->estatus)
							@case('En Espera')
								<label style="color:blue">{{$value->estatus}}</label>
								@break
							@case('Rechazada')
								<label style="color: red">{{$value->estatus}}</label>
								@break
							@case('Aceptado')
								<label style="color: green">{{$value->estatus}}</label>
								@break
							@case('Asignado')
								<label style="color:deepskyblue">{{$value->estatus}}</label>
								@break
							@case('Aprobado')
								<label style="color:darkgreen"">{{$value->estatus}}</label>
								@break
						@endswitch
					</td>
					<td align="center">
						<a class="btn btn-circle btn-info btn-sm" href="javascript:void(0);" onclick="javascript:window.open('{{$value->memorandum_traspaso}}', '_blank'); window.open('{{$value->solicitud_credito_presupuestario}}', '_blank'); "><i class="fa fa-search"></i></a>
						{{-- <button class="btn btn-circle btn-info" name="aceptar" value="2" type="submit"><i class="fa fa-search"></i></button> --}}
					</td>
                    <td>
						@if ($value->estatus=='Rechazada' || $value->estatus=='Aprobado')
							<button disabled type="submit" class="btn btn-violet btn-circle btn-sm waves-effect waves-light" name="aceptar" value="1"><i class="ico icon-upload"></i></button> &nbsp;&nbsp;&nbsp;&nbsp;<img src="assets/images/slash.png" width="10%" alt="">&nbsp;&nbsp;&nbsp;&nbsp;
							<button disabled type="submit" class="btn btn-danger btn-circle btn-sm waves-effect waves-light" name="aceptar" value="0"><i class="ico icon-cancel"></i></button>
						@else
							<button type="submit" class="btn btn-violet btn-circle btn-sm waves-effect waves-light" name="aceptar" value="1"><i class="ico icon-upload"></i></button> &nbsp;&nbsp;&nbsp;&nbsp;<img src="assets/images/slash.png" width="10%" alt="">&nbsp;&nbsp;&nbsp;&nbsp;
							<button type="submit" class="btn btn-danger btn-circle btn-sm waves-effect waves-light" name="aceptar" value="0"><i class="ico icon-cancel"></i></button>
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
