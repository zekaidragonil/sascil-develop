@extends('principal')
@section('view_consulta')
<!-- /.col-xs-12 -->
<div class="col-xs-12">
	<div class="box-content">
		<h4 class="box-title">Lista de Usuarios</h4>
		<!-- /.box-title -->
		
		<!-- /.dropdown js__dropdown -->
		
		<table id="example" class="table table-striped table-bordered display" style="width:100%">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Correo</th>
					<th>Perfil</th>
					<th>Estatus</th>
					<th>Unidad</th>
					<th>Ente</th>
					<th>Editar</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Correo</th>
					<th>Perfil</th>
					<th>Estatus</th>
					<th>Unidad</th>
					<th>Ente</th>
					<th>Editar</th>
				</tr>
			</tfoot>
			<tbody>
				@foreach ($lista as $key => $value) 
				<tr>
				<form action="{{url('view_editar_usuario')}}" method="POST">
					@csrf
					<td><input type="text" name="id" hidden value="{{$value->id}}">{{$value->nombre}}</td>
					<td>{{$value->apellido}}</td>
					<td>{{$value->correo}}</td>
					<td>{{$value->nombre_perfil}}</td>
					<td>
						@if($value->estatus==1)
							Activo
						@else
							Desactivo
						@endif
					</td>
					<td>{{$value->unidad}}</td>
					<td>{{$value->ente}}</td>
					<td>
					<button type="submit" class="btn btn-info btn-circle waves-effect waves-light" type="button"><i class="fa fa-edit" aria-hidden="true"></i></button>	
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