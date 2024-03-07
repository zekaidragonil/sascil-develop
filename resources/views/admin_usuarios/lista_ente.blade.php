@extends('principal')
@section('view_entes')
<!-- /.col-xs-12 -->
<div class="col-xs-12">
	<div class="box-content">
		<h4 class="box-title">Lista de Entes</h4>
		<form action="{{url('agregar_ente')}}" method="POST">
		@csrf
			<label for="">Agregar Ente</label>&nbsp;&nbsp;<a href="{{url('agregar_ente')}}" title="Agregar un nuevo ente"class="btn btn-success btn-circle btn-sm waves-effect waves-light"><i class="fa fa-plus"></i></a>
		<!-- /.dropdown js__dropdown -->
		</form>
		<table id="example-scroll-y" class="table table-striped table-bordered display" style="width:100%">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Rif</th>
					<th>Parroquia</th>
					<th>Municipio</th>
					<th>Estado</th>
                    <th>Ver</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
                    <th>Nombre</th>
					<th>Rif</th>
					<th>Parroquia</th>
					<th>Municipio</th>
					<th>Estado</th>
                    <th>Ver</th>
				</tr>
			</tfoot>
			<tbody>
				@foreach ($ente as $key => $value) 
				<tr>
				<form action="{{url('view_unidad')}}" method="POST">
					@csrf
					
					<td>{{$value->nombre}}</td>
					<td>{{$value->rif}}</td>
					<td>{{$value->parroquia}}</td>
					<td>{{$value->municipio}}</td>
                    <td>{{$value->estado}}</td>
                    <td>
                    <input type="text" hidden name="id" value="{{$value->id}}">
					<button type="submit" class="btn btn-info btn-rounded waves-effect waves-light" type="button"><i class="fa fa-search"></i></button>	
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