@extends('principal')
@section('lista_proyectos')
<!-- /.col-xs-12 -->
<div class="col-xs-12">
	<div class="box-content">
		<h4 class="box-title">Listado de Proyectos Cargados</h4>
		<!-- /.box-title -->
		<!-- /.dropdown js__dropdown -->
		<table id="example" class="table table-striped table-bordered display" style="width:100%">
			<thead>
				<tr>
					<th>Proyectos Presupuestarios</th>
					<th style="width: 20%">Nombre del Proyecto</th>
					<th>Categoría</th>
					<th>Financiamiento</th>
					<th>Monto (Bs)</th>
                    <th>Unidad</th>
                    <th style="width: 20%" >Fecha</th>
                    <th style="width: 20%" >Agregar Partida &nbsp;&nbsp; /&nbsp;&nbsp; Ver</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>Proyectos Presupuestarios</th>
					<th style="width: 20%">Nombre del Proyecto</th>
					<th>Categoría</th>
					<th>Financiamiento</th>
					<th>Monto (Bs)</th>
                    <th>Unidad</th>
                    <th style="width: 20%" >Fecha</th>
                    <th style="width: 20%">Agregar Partida&nbsp;&nbsp; /&nbsp;&nbsp; Ver</th>
				</tr>
			</tfoot>
			<tbody>
				@foreach ($proyectos as $key => $value)
				<tr>
                    <form action="{{url('partida')}}" method="POST">
                    @csrf
					<td>{{$value->proyecto_presupuestario}}</td>
					<td style="width: 20%"><input type="text" value="{{$value->id}}" hidden="true" name="id_proyecto">{{$value->nombre_proyecto}}</td>
					@if($value->categoria=='a')
                    <td>Anual</td>
                    @else
                    <td>Anual</td>
                    @endif
					<td>{{$value->fondo}}</td>
					<td align="right">{{number_format($value->monto_proyecto,2,',','.')}}</td>
                    <td>{{$value->nombre}}<input type="text" name="id_unidad" hidden="true" value="{{$value->id_unidad}}"></td>
                    <td>{{$value->created_at}}</td>
                    <td align="center" style="width: 20%">

                        <button type="submit" name="boton1" value="1" class="btn btn-xs btn-success  btn-circle waves-effect waves-light" type="button" title="Agregar Partida presupuestaria"><i class="fa fa-plus" aria-hidden="true"></i></button>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img src="assets/images/slash.png" style="width: 10%" alt=""> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="submit" name="boton2" value="1" class="btn btn-xs btn-info btn-circle waves-effect waves-light" type="button" title="Ver"><i class="fa fa-search" aria-hidden="true"></i></button>

                    </td>
                    </form>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<!-- /.box-content -->
</div>
<!--colocar el script para activar el modal de forma automatica-->
@endsection
