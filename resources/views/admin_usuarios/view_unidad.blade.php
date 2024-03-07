@extends('principal')
@section('view_unidad')
<!-- /.col-xs-12 -->
<div class="col-xs-12">
	<div class="box-content">
		<h4 class="box-title">Unidades Administrativas</h4>
		<!-- /.box-title -->
		<form action="{{url('agregar_unidad')}}" method="POST">
		@csrf
			<input type="text" name="id_ente" hidden value="{{$id}}">
			<label for="">Agregar Unidad</label>&nbsp;&nbsp;<button name="modificar" title="Agregar una nueva unidad"class="btn btn-success btn-circle btn-sm waves-effect waves-light" type="submit"><i class="fa fa-plus"></i></button>
		<!-- /.dropdown js__dropdown -->
		</form>
		<table id="example-scroll-y" class="table table-striped table-bordered display" style="width:100%">
			<thead>
				<tr>
					<th>Oficina</th>
					<th>Ente</th>
					<th>Editar/Eliminar</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
                    <th>Oficina</th>
					<th>Ente</th>
                    <th>Editar/Eliminar</th>
				</tr>
			</tfoot>
			<tbody>
				@foreach ($unidad as $key => $value) 
				<tr>
				<form action="{{url('editar_unidad')}}" method="POST">
					@csrf
					
					<td>{{$value->unidad}}</td>
					<td>{{$value->ente}}</td>
                    <td>
                    <input type="text" hidden name="id" value="{{$value->id}}">
					<button type="submit" name="modificar" value="1" class="btn btn-info btn-circle btn-sm waves-effect waves-light" type="button"><i class="fa fa-edit"></i></button>
                    <button type="submit" name="eliminar" value="0" class="btn btn-danger btn-circle btn-sm waves-effect waves-light" type="button"><i class="fa fa-close"></i></button>
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