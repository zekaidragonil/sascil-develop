@extends('principal')
@section('lista_solicitud')
<!-- /.col-xs-12 -->
<div class="col-xs-12">
	<div class="box-content">
		<h4 class="box-title">Lista de Usuarios</h4>
		<!-- /.box-title -->
		<!-- /.dropdown js__dropdown -->
		<table id="example-scroll-y" class="table table-striped table-bordered display" style="width:100%">
			<thead>
				<tr>
					<th>N° Punto</th>
					<th>Estatus</th>
					<th>Unidad</th>
					<th>Ente</th>
					<th>Fecha</th>
                    <th>Verificar</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
                    <th>N° Punto</th>
					<th>Estatus</th>
					<th>Unidad</th>
					<th>Ente</th>
					<th>Fecha</th>
                    <th>Verificar</th>
				</tr>
			</tfoot>
			<tbody>
				@foreach ($consulta as $key => $value) 
				<tr>
				<form action="{{url('verificar_solicitud')}}" method="POST">
					@csrf
					<td>{{$value->numero_punto_cuenta}}</td>
					<td>{{$value->estatus}}</td>
					<td>{{$value->unidad}}</td>
					<td>{{$value->ente}}</td>
					<td>{{$value->fecha}}</td>
					<td>
                    <input type="text" name="id_solicitud" hidden value="{{$value->id}}">
					<button type="submit" class="btn btn-success btn-rounded waves-effect waves-light" type="button"><i class="fa fa-search"></i></button>	
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